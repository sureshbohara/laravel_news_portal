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
use App\Models\LikeDislike;
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


       //first section(राजनीति)

        $data['firstSection']= News::where('status',1)->where('news_type','राजनीति')->orderBy('id','Desc')->take(10)->get();
        
        //second section(मुख्य समाचार)
        $data['secondSection']= News::where('status',1)->where('news_type','मुख्य-समाचार')->orderBy('id','Desc')->take(11)->get();

        //third section(अर्थतन्त्र)
        $data['thirdSection']= News::where('status',1)->where('news_type','अर्थतन्त्र')->orderBy('id','Desc')->take(14)->get();

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
        $data['fifthSection']= News::where('status',1)->where('news_type','खेलकुद')->orderBy('id','Desc')->take(11)->get();

        // sixth section(manoranjan)
        $data['sixSection']= News::where('status',1)->where('news_type','मनोरञ्जन')->orderBy('id','Desc')->take(8)->get();

        // seven section(जीवनशैली)

        $data['sevenSection']= News::where('status',1)->where('news_type','जीवनशैली')->orderBy('id','Desc')->take(6)->get();


        //अन्तर्वार्ता section
        $data['interviewSection']= News::where('status',1)->where('news_type','अन्तर्वार्ता')->orderBy('id','Desc')->take(6)->get();

         // eight section(पर्यटन)
        $data['eightSection']= News::where('status',1)->where('news_type','पर्यटन')->orderBy('id','Desc')->take(6)->get();


         // तराई-खबर-स्पेसल
         $data['taraikhabarSection']= News::where('status',1)->where('news_type','तराई-खबर-स्पेसल')->orderBy('id','Desc')->take(9)->get();


          //bichar section
        $data['sidebarSection']= News::where('status',1)->where('news_type','विचार')->orderBy('id','Desc')->take(3)->get();


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
        $posts = $category->news()->take(10)->get();
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


  // Save Like Or dislike
    function save_likedislike(Request $request){
        $data=new LikeDislike;
        $data->post_id=$request->post;
        if($request->type=='like'){
            $data->like=1;
        }else{
            $data->dislike=1;
        }
        $data->save();
        return response()->json([
            'bool'=>true
        ]);
    }

   // load more news ajax
    function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=10;
            $news=News::skip($skip)->take($take)->get();
            return response()->json($news);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }




}
