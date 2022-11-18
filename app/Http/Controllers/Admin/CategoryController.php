<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Utility\CategoryUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Session;
use Cache;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderBy('order_level', 'desc')->get();
      return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $request->icon;

        $category->order_level = 0;
        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }

      
        $category->meta_keywords = $request->meta_keywords;
        $category->meta_descriptions = $request->meta_descriptions;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }

        if($category->meta_keywords == null) {
        $category->meta_keywords = $category->name;
        }

        if($category->meta_descriptions == null) {
        $category->meta_descriptions = $category->name;
        }



          if ($category) {
            if ($request->hasFile('icon')) {
                $category->addMediaFromRequest('icon')->toMediaCollection('icon');
             }
           }

       


        $category->save();
        toastr()->success('Data has been inserted successfully !!');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request, $id)
    {
        
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=' , $category->id)
            ->orderBy('name','asc')
            ->get();

        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        if($request->order_level != null) {
            $category->order_level = $request->order_level;
        }

        $category->meta_keywords = $request->meta_keywords;
        $category->meta_descriptions = $request->meta_descriptions;

        $previous_level = $category->level;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1 ;
        }
        else{
            $category->parent_id = 0;
            $category->level = 0;
        }

        if($category->level > $previous_level){
            CategoryUtility::move_level_down($category->id);
        }
        elseif ($category->level < $previous_level) {
            CategoryUtility::move_level_up($category->id);
        }

        if($category->meta_keywords == null) {
        $category->meta_keywords = $category->name;
        }

        if($category->meta_descriptions == null) {
        $category->meta_descriptions = $category->name;
        }


         if ($category) {
            if ($request->hasFile('icon')) {
                $category->addMediaFromRequest('icon')->toMediaCollection('icon');
             }
           }

        $category->save();
        Cache::forget('featured_categories');
        toastr()->success('Data has been updated  successfully. !!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
     public function destroy($id){
        $data = Category::find($id);
        CategoryUtility::delete_category($id);
        News::where('category_id',$data->id)->delete();
        Cache::forget('featured_categories');
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

    //change user status
     public function changeCategoryStatus(Request $request){
        $id = $request->get('category_id');
        $data = Category::find($id);
        if($data->status == 1) {
        $data->status = 0;
        }else {
        $data->status = 1;
        }
        $data->update();
        toastr()->success('Data Change successfully. !!');
        return back();
    }
}
