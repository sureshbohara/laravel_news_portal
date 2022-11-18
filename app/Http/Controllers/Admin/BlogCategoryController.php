<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Session;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     $blogCategory = BlogCategory::orderBy('id','Asc')->get();
     return view('admin.blogs_category.index',compact('blogCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
     $this->validate($request,[
     'name' => 'required|unique:blog_categories,name'
     ]);
     BlogCategory::create($request->all());
     toastr()->success('Data Create Successfully');
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

     $blogCategory = BlogCategory::find($id);
     $blogCategory->name = $request->name;
     $blogCategory->order_level = $request->order_level;
     $blogCategory->slug = $request->slug;
     $blogCategory->update();
     toastr()->success('Data Update successfully. !!');
     return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogCategory  $blogCategory
     * @return \Illuminate\Http\Response
     */
     public function destroy($id){
        $data = BlogCategory::find($id);
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

    //change user status
     public function changebcategoryStatus(Request $request){
        $id = $request->get('bcategory_id');
        $data = BlogCategory::find($id);
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
