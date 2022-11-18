<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Utility\CategoryUtility;
use Pratiksh\Nepalidate\Facades\NepaliDate;
use Illuminate\Support\Facades\File;
use App\Models\News;
use App\Models\Advertisement;
use App\Models\Page;
use App\Models\Poll;
use Carbon\Carbon;
use App\Models\Counter;
use Auth;
use Session;
use DB;
use App\Models\NewsCategory;
use App\Models\Tags;
use App\Models\NewsTags;
use App\Models\Comment;
class IndexController extends Controller
{
    public function index(){
          //customer visitors
       Counter::increment('views');
        // slider news
        $data['sliderNews']= News::where('status',1)->orderBy('id','Desc')->take(7)->get();
        //banner image
        $data['bannerNews']= News::where('status',1)->where('news_type','banner')->orderBy('id','Desc')->take(4)->get();

        $data['videoSection'] = News::where('status',1)->where('video_id', '!=','NULL')->orderBy('id','desc')->take(8)->get();

        // tags display
        //$data['trendingTags'] = News::select('tags')->groupBy('tags')->orderBy('id','Desc')->take(9)->get();

       //first section(राजनीति)
        $data['bannerNews']= News::where('status',1)->where('news_type','राजनीति')->orderBy('id','Desc')->take(10)->get();

        $category5 = Category::where('id',5)->pluck('id');
        $data['firstSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category5)->orderBy('news.id','desc')->take(10)->get();
        
        //second section(मुख्य समाचार)

        $category1 = Category::where('id',1)->pluck('id');
        $data['secondSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category1)->orderBy('news.id','desc')->take(11)->get();
        //$data['secondSection'] = News::where('category_id',1)->where('status',1)->orderBy('id','Desc')->take(11)->get();

        //third section(अर्थतन्त्र)
        $category3 = Category::where('id',14)->pluck('id');
        $data['thirdSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category3)->orderBy('news.id','desc')->take(14)->get();
        //$data['thirdSection'] = News::where('category_id',14)->where('status',1)->orderBy('id','Desc')->take(6)->get();

        //forth section (pardesh)

        $category7 = Category::where('id',7)->pluck('id');
        $data['pardesh1Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category7)->orderBy('news.id','desc')->take(9)->get();

        //$data['pardesh1Section'] = News::where('category_id',7)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category8 = Category::where('id',8)->pluck('id');
        $data['pardesh2Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category8)->orderBy('news.id','desc')->take(9)->get();
        //$data['pardesh2Section'] = News::where('category_id',8)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category9 = Category::where('id',9)->pluck('id');
        $data['pardesh3Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category9)->orderBy('news.id','desc')->take(9)->get();
        //$data['pardesh3Section'] = News::where('category_id',9)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category10 = Category::where('id',10)->pluck('id');
        $data['pardesh4Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category10)->orderBy('news.id','desc')->take(9)->get();
        //$data['pardesh4Section'] = News::where('category_id',10)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category11 = Category::where('id',11)->pluck('id');
        $data['pardesh5Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category11)->orderBy('news.id','desc')->take(9)->get();

        //$data['pardesh5Section'] = News::where('category_id',11)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category12 = Category::where('id',12)->pluck('id');
        $data['pardesh6Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category12)->orderBy('news.id','desc')->take(9)->get();
        //$data['pardesh6Section'] = News::where('category_id',12)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        $category13 = Category::where('id',13)->pluck('id');
        $data['pardesh7Section'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category13)->orderBy('news.id','desc')->take(9)->get();
        //$data['pardesh7Section'] = News::where('category_id',13)->where('status',1)->orderBy('id','Desc')->take(9)->get();

        // fifth section(khelkud)
        $category20 = Category::where('id',20)->pluck('id');
        $data['fifthSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category20)->orderBy('news.id','desc')->take(11)->get();
        //$data['fifthSection'] = News::where('category_id',20)->where('status',1)->orderBy('id','Desc')->take(11)->get();
        // sixth section(manoranjan)
        $category21 = Category::where('id',21)->pluck('id');
        $data['sixSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category21)->orderBy('news.id','desc')->take(8)->get();
        //$data['sixSection'] = News::where('category_id',21)->where('status',1)->orderBy('id','Desc')->take(8)->get();

        // seven section(jeevensaili)
        $category22 = Category::where('id',22)->pluck('id');
        $data['sevenSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category22)->orderBy('news.id','desc')->take(6)->get();
        //$data['sevenSection'] = News::where('category_id',22)->where('status',1)->orderBy('id','Desc')->take(6)->get();

        //interview section
         $category25 = Category::where('id',25)->pluck('id');
         $data['interviewSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category25)->orderBy('news.id','desc')->take(6)->get();
         //$data['interviewSection'] = News::where('category_id',25)->where('status',1)->orderBy('id','Desc')->take(6)->get();
         // eight section(paretan)
          $category30 = Category::where('id',30)->pluck('id');
         $data['eightSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category30)->orderBy('news.id','desc')->take(6)->get();
         //$data['eightSection'] = News::where('category_id',30)->where('status',1)->orderBy('id','Desc')->take(6)->get();

         //last section
          $category34 = Category::where('id',34)->pluck('id');
         $data['taraikhabarSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category34)->orderBy('news.id','desc')->take(9)->get();
         //$data['taraikhabarSection'] = News::where('category_id',34)->where('status',1)->orderBy('id','Desc')->take(9)->get();

          //bichar section
         $category35 = Category::where('id',35)->pluck('id');
         $data['sidebarSection'] = News::leftJoin('news_categories', 'news.id', '=', 'news_categories.news_id')
            ->where('news.status','1')->where('news_categories.category_id',$category35)->orderBy('news.id','desc')->take(3)->get();
         //$data['sidebarSection'] = News::where('category_id',35)->where('status',1)->orderBy('id','Desc')->take(3)->get();

        $data['popularPost'] = News::select("*")->orderBy('view_count','Desc')->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(6)->get();
       //dd($popularPost);die;

        

        $data['regularFirst'] = Advertisement::where('place','regular_1')->orderBy('id',"Desc")->where('status',1)->take(3)->get();

        $data['secondFirst'] = Advertisement::where('place','regular_2')->orderBy('id',"Desc")->where('status',1)->take(2)->get();

        $data['thirdFirst'] = Advertisement::where('place','regular_3')->orderBy('id',"Desc")->where('status',1)->take(2)->get();

        $data['forthFirst'] = Advertisement::where('place','regular_4')->orderBy('id',"Desc")->where('status',1)->take(2)->get();

        $data['homeSidebar'] = Advertisement::where('place','sidebar')->orderBy('id',"Desc")->where('status',1)->take(3)->get();

      return view('pages.index',$data);
    }


    //category by post



   

   public function categoryPost(Request $request,$id,$slug)
    {
        
        
       $category = Category::findOrFail($id);
       if($category){
        $posts = $category->news()->paginate(10);
         //get category name for brdcrm
       $categoryName = Category::where('id',$id)->where('slug',$slug)->first();
        return view('pages.category_post',compact('category','posts','categoryName'));
    }

      return view('errors.404');
    
    }

     public function tagsPost(Request $request,$id,$slug)
    {
       $tags = Tags::findOrFail($id);
        if($tags){
         $posts = $tags->news()->paginate(10);
         $tagsName = Tags::where('id',$id)->where('slug',$slug)->first();
        return view('pages.tags_news',compact('tags','posts','tagsName'));
    }

    return view('errors.404');
    
    }


    public function postDetails(Request $request,$id){
           $postDetails = News::where('id', $id)->find($id);
           // ===============Get Related Post===================
  
           //$relatedPost = News::where('id' ,$postDetails['categories']['id'])
           //->where('id','!=',$id)->limit(10)->inRandomOrder()->get();

           //post view increase
          $data['news'] = News::where('id',$id)->where('status','1')->first();
          $data['news']->view_count=$postDetails->view_count +1;
          $data['news']->update();
        


         //related post
          $skip=News::where('id',$id)->where('status','1')->pluck('id');
          $mmm = NewsCategory::where('news_id',$skip )->latest()->take(1)->pluck('category_id');
          $data['find'] = NewsCategory::where('category_id',$mmm)->where('news_id','!=',$skip)->latest()->get();


        $afterFirst = Advertisement::where('place','after_header')->orderBy('id',"desc")->where('status',1)->take(2)->get();
        $beforeFirst = Advertisement::where('place','before_content')->orderBy('id',"desc")->where('status',1)->take(2)->get();

        $detailsPageSidebar = Advertisement::where('place','details')->orderBy('id',"desc")->where('status',1)->take(3)->get();


        $popularPost = News::select("*")->orderBy('view_count','Desc')->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(10)->get();


        $pollData = Poll::orderBy('id',"desc")->where('status',1)->first();
        

        //comment
        $usercomment = Comment::with(['users','news'])->where('post_id',$id)->orderBy('id','Desc')->get()->toArray();
       return view('pages.details',compact('postDetails','afterFirst','beforeFirst','detailsPageSidebar','popularPost','pollData','data','usercomment'));  
    }



      //page details
    public function pageDetails($slug){
     $data['footerPage'] = Page::where('status',1)->get();
     $data['pageDetails'] = Page::where('slug',$slug)->get()->first();
      return view('pages.page_details',$data);  
    }


    public function pollSubmit(Request $request)
    {
       
      $poll_data = Poll::where('id',$request->id)->first();
      // user vote can  Yes
       if($request->vote == 'Yes'){
        $dataUpdatedYes = $poll_data->yes_vote+1;
        $poll_data->yes_vote = $dataUpdatedYes;
       }
       // user vote can  No
       if($request->vote == 'No'){
        $dataUpdatedNo = $poll_data->no_vote+1;
        $poll_data->no_vote = $dataUpdatedNo;
       }
       // user vote can  No Vote
       if($request->vote == 'No Vote'){
        $dataUpdatedNoVote = $poll_data->no_comment+1;
        $poll_data->no_comment = $dataUpdatedNoVote;
       }
       $poll_data->update();
       session()->put('current_poll_id',$poll_data->id);
       toastr()->success('Your vote is counted successfully!!');
       return back();

    }


  public function pollResult(){
    $poll_data = Poll::where('status',1)->orderBy('id','desc')->get();
    return view('pages.all_poll',compact('poll_data'));
  }
}
