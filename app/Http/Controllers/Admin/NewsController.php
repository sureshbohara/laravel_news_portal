<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use App\Models\News;
use Auth;
use Session;
use Artisan;
use Cache;
use App\Models\NewsCategory;
use App\Models\Tags;
use App\Models\NewsTags;
use App\Models\NewsletterSubscribe;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $currentuser = auth()->guard('admin')->user()->name;
        $data['news'] = News::orderBy('id','Desc')->with('category')->where('created_by','=',$currentuser)
         ->get(['id','title','news_type','status','feature_image']);
        return view('admin.news.index',$data);
    }

     public function allNews(){
      $allNews = News::with('category')->where('status',1)->orderBy('id', 'Desc')->get();
      return view('admin.news.all_news',compact('allNews'));
    }
    public function archive()
    {
        $archive = News::with('category')->where('status',0)->orderBy('id', 'Desc')->get();
        return view('admin.news.archive',compact('archive'));
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
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // send notification on user
        $subscriber = NewsletterSubscribe::all();
        $news = new News;
        $news->title = $request->title;
        $news->banner_tags = $request->banner_tags;
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->pradesh = $request->pradesh;
        $news->news_type = $request->news_type;
        $news->video_id = $request->video_id;
        $news->meta_title = $request->meta_title;
        $news->meta_descriptions = $request->meta_descriptions;
        $news->author_name = $request->author_name;
    
        $meta_keywords = array();
        if($request->meta_keywords[0] != null){
            foreach (json_decode($request->meta_keywords[0]) as $key => $keywords) {
                array_push($meta_keywords, $keywords->value);
            }
        }
        $news->meta_keywords = implode(',', $meta_keywords);


        if($news->meta_title == null) {
          $news->meta_title = $news->title;
        }
        if($news->meta_keywords == null) {
          $news->meta_keywords = $news->title;
         }

        if($news->meta_descriptions == null) {
            $news->meta_descriptions = strip_tags($news->short_description);
        }
        $news->status = 1;
        if($request->button == 'unpublish' || $request->button == 'draft') {
          $news->status = 0;
        }


            // ===============product image upload path===================
             if($request->hasFile('feature_image')){
              $image_tmp = $request->file('feature_image');
              if($image_tmp->isValid()){
                // ===============Get Image Extension===================
                $image_name = $image_tmp->getClientOriginalExtension();
                // ===============Get Image Extension===================
                $extension = $image_tmp->getClientOriginalExtension();                  
                // ===============Generate New Image Name===================            
                $imageName = $image_name.'_'.rand(111,99999).'.'.$extension;
                // ===============Upload image path small,medium & large===================
                $large_image_path = 'images/news/large/'.$imageName;//large image upload path
                $medium_image_path = 'images/news/medium/'.$imageName;//medium image upload path
                $small_image_path = 'images/news/small/'.$imageName;//small image upload path
                // ===============Upload the Image with  resize===================
                Image::make($image_tmp)->save($large_image_path);//large image size
                Image::make($image_tmp)->resize(770,480)->save($medium_image_path);//medium image size
                Image::make($image_tmp)->resize(237,175)->save($small_image_path);//small image size
                 // ===============Save Category Image===================
                $news->feature_image = $imageName;
            }
        }


     $news->created_by = auth()->guard('admin')->user()->name;
     $news->save();
     
     Notification::send($subscriber, new PostNotification($news));
     // check multiple category
     var_dump($request->category_id);
     $news->categories()->sync($request->input('category_id'));

     var_dump($request->tags);
     $news->tags()->sync($request->input('tags'));
     toastr()->success('Data has been inserted successfully !!');
    return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
     {
        $news = News::findOrFail($id);
        $tags = json_decode($news->tags);
        $meta_keywords = json_decode($news->meta_keywords);
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();

            
        return view('admin.news.edit', compact('news', 'categories', 'tags','meta_keywords'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
    {
        try{
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->banner_tags = $request->banner_tags;
        $news->category_id = $request->category_id;
        $news->short_description = $request->short_description;
        $news->description = $request->description;
        $news->pradesh = $request->pradesh;
        $news->news_type = $request->news_type;
        $news->video_id = $request->video_id;
        $news->meta_title = $request->meta_title;
        $news->meta_descriptions = $request->meta_descriptions;
        $news->author_name = $request->author_name;
        $meta_keywords = array();
        if($request->meta_keywords[0] != null){
            foreach (json_decode($request->meta_keywords[0]) as $key => $keywords) {
                array_push($meta_keywords, $keywords->value);
            }
        }

        $news->meta_keywords = implode(',', $meta_keywords);


        $tags = array();
        if($request->tags[0] != null){
            foreach (json_decode($request->tags[0]) as $key => $tag) {
                array_push($tags, $tag->value);
            }
        }

        $news->tags = implode(',', $tags);

        if($news->meta_title == null) {
          $news->meta_title = $news->title;
        }
        if($news->meta_keywords == null) {
          $news->meta_keywords = $news->tags;
         }

        if($news->meta_descriptions == null) {
            $news->meta_descriptions = strip_tags($news->short_description);
        }


            

            // ===============product image upload path===================
             if($request->hasFile('feature_image')){
              $image_tmp = $request->file('feature_image');
              if($image_tmp->isValid()){
                // ===============Get Image Extension===================
                $image_name = $image_tmp->getClientOriginalExtension();
                // ===============Get Image Extension===================
                $extension = $image_tmp->getClientOriginalExtension();                  
                // ===============Generate New Image Name===================            
                $imageName = $image_name.'_'.rand(111,99999).'.'.$extension;
                // ===============Upload image path small,medium & large===================
                $large_image_path = 'images/news/large/'.$imageName;//large image upload path
                $medium_image_path = 'images/news/medium/'.$imageName;//medium image upload path
                $small_image_path = 'images/news/small/'.$imageName;//small image upload path
                // ===============Upload the Image with  resize===================
                Image::make($image_tmp)->save($large_image_path);//large image size
                Image::make($image_tmp)->resize(770,480)->save($medium_image_path);//medium image size
                Image::make($image_tmp)->resize(237,175)->save($small_image_path);//small image size
                 // ===============Save Category Image===================
                $news->feature_image = $imageName;
            }
        }


     $news->updated_by = auth()->guard('admin')->user()->name;
     $news->save();
     var_dump($request->category_id);
     $news->categories()->sync($request->input('category_id'));

     var_dump($request->tags);
     $news->tags()->sync($request->input('tags'));

     toastr()->success('Data has been Update successfully !!');
    return redirect()->route('news.index');
    }catch(\Exception $e){
            // redirect()->back()->with('warning','plz enter a valid data');
     return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
 

    // ===============product alt image delete ===================
public function destroy($id){
   $newsData = News::where(['id'=>$id])->first();
   $newsData->delete();

     $largeImage = 'image/news/large/';
      if(!empty($newsData->feature_image)){
         if(file_exists($largeImage.$newsData->feature_image)){
           unlink($largeImage.$newsData->feature_image);
        }
      }

     $mediumImage = 'image/news/medium/';
      if(!empty($newsData->feature_image)){
         if(file_exists($mediumImage.$newsData->feature_image)){
           unlink($mediumImage.$newsData->feature_image);
        }
      }

       $smallImage = 'image/news/small/';
       if(!empty($newsData->feature_image)){
         if(file_exists($smallImage.$newsData->feature_image)){
           unlink($smallImage.$newsData->feature_image);
        }
      }



    toastr()->success('Data Delated successfully. !!');
    return redirect()->back();
}

     //change user status
     public function changeNewsStatus(Request $request){
        $id = $request->get('news_id');
        $data = News::find($id);
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
