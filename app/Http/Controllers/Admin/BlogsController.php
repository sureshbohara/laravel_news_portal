<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Blogs;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Session;
class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
     $blogs = Blogs::orderBy('id','Asc')->get();
     return view('admin.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {

        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogs = new Blogs;
        $blogs->title = $request->title;
        $blogs->slug = $request->slug;
        $blogs->description = $request->description;
        $blogs->bcategory_id = $request->bcategory_id;

        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
            array_push($tags, $tag->value);
            }
        }
        $blogs->tags = implode(',', $tags);

        $meta_keywords = array();
        if($request->meta_keywords[0] != null){
            foreach (json_decode($request->meta_keywords[0]) as $key => $keywords) {
            array_push($meta_keywords, $keywords->value);
            }
        }
        $blogs->meta_keywords = implode(',', $meta_keywords);

        $blogs->meta_descriptions = $request->meta_descriptions;
        if($blogs->meta_keywords == null) {
        $blogs->meta_keywords = $blogs->tags;
        }
        if($blogs->meta_descriptions == null) {
        $blogs->meta_descriptions = $blogs->description;
        }

          if($request->hasFile('feature_image')){
              $image_tmp = $request->file('feature_image');
              if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();                            
                $imageName = rand(111,99999).'.'.$extension;
                $imagePath = 'images/blogs/'.$imageName;
                Image::make($image_tmp)->resize(300,250)->save($imagePath);
                $blogs['feature_image'] = $imageName;
              }
            }
        $blogs->save();
        toastr()->success('Data has been inserted successfully !!');
        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
      $blogs = Blogs::findOrFail($id);
      $tags = json_decode($blogs->tags);
      $meta_keywords = json_decode($blogs->meta_keywords);
      return view('admin.blogs.edit',compact('blogs','tags','meta_keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,$id)
    {
        $blogs = Blogs::findOrFail($id);
        $blogs->title = $request->title;
        $blogs->slug = $request->slug;
        $blogs->description = $request->description;
        $blogs->bcategory_id = $request->bcategory_id;

        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
            array_push($tags, $tag->value);
            }
        }
        $blogs->tags = implode(',', $tags);

        $meta_keywords = array();
        if($request->meta_keywords[0] != null){
            foreach (json_decode($request->meta_keywords[0]) as $key => $keywords) {
            array_push($meta_keywords, $keywords->value);
            }
        }
        $blogs->meta_keywords = implode(',', $meta_keywords);

        $blogs->meta_descriptions = $request->meta_descriptions;
        if($blogs->meta_keywords == null) {
        $blogs->meta_keywords = $blogs->tags;
        }
        if($blogs->meta_descriptions == null) {
        $blogs->meta_descriptions = $blogs->description;
        }

          if($request->hasFile('feature_image')){
              $image_tmp = $request->file('feature_image');
              if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();                            
                $imageName = rand(111,99999).'.'.$extension;
                $imagePath = 'images/blogs/'.$imageName;
                Image::make($image_tmp)->resize(300,250)->save($imagePath);
                $blogs['feature_image'] = $imageName;
              }
            }
        $blogs->save();
        toastr()->success('Data has been updated successfully !!');
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
   $blogs = Blogs::where(['id'=>$id])->first();
   $blogs->delete();

     $largeImage = 'image/blogs/';
      if(!empty($blogs->feature_image)){
         if(file_exists($largeImage.$blogs->feature_image)){
           unlink($largeImage.$blogs->feature_image);
        }
      }
    toastr()->success('Data Delated successfully. !!');
    return redirect()->back();
}

    //change user status
     public function changeblogsStatus(Request $request){
        $id = $request->get('blogs_id');
        $data = Blogs::find($id);
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
