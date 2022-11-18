<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\Models\Category;
use App\Models\News;
use App\Models\Advertisement;
use App\Models\Blogs;
use App\Models\Poll;
use App\Models\Page;
use Carbon\Carbon;
use DB;
class AdminController extends Controller
{


    public function dashboard()
    {
    $data['category'] = Category::where('status',1)->count();
    $data['news'] = News::where('status',1)->count();
    $data['draft'] = News::where('status',0)->count();
    $data['publicAdv'] = Advertisement::where('status',1)->count();
    $data['draftAdv'] = Advertisement::where('status',0)->count();
    $data['poll'] = Poll::where('status',1)->count();
    $data['blogPost'] = Blogs::where('status',1)->count();
    $data['pages'] = Page::where('status',1)->count();


    $data['newsCount'] = News::select('pradesh',DB::raw('count(pradesh) as count'))->groupBy('pradesh')->get()->toArray();

    $data['newsType'] = News::select('news_type',DB::raw('count(news_type) as count'))->groupBy('news_type')->get()->toArray();

    $data['count']=News::where('created_by',auth()->guard('admin')->user()->name)->count();

    $data['numberOfPostMonth'] = News::whereMonth('created_at', Carbon::now()->month)->count();


    $data['count_post']=News::whereMonth('created_at', Carbon::now()->month)
    ->where('created_by',auth()->guard('admin')->user()->name)
    ->count();


     $currentuser = auth()->guard('admin')->user()->name;
     $data['myPost'] = News::with('category')->where('created_by','=',$currentuser)
         ->get(['id','title','news_type','feature_image','status']);
    
    $poll_data = Poll::where('status',1)->orderBy('id','desc')->limit(4)->get();

   // where tags_post is any name abc xyz

    $tagsPos = DB::select(DB::raw("select count(*) as tags_post, tags_id from news_tags group by tags_id"));
    $tagsData =  "";
    foreach($tagsPos as $postCount){
        $tagsData.="['".$postCount->tags_id."', ".$postCount->tags_post."],";
    }
    $data['tagsData']=rtrim($tagsData,",");

    return view('admin.dashboard',$data,compact('poll_data'));
    }

   
    public function adminLogin(Request $request)
    {
    //echo $password =Hash::make('admin');die;
    if($request->isMethod('post')){
       $data = $request->all();

        $validated = $request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required',
        ]);

       if(Auth::guard('admin')->attempt([
        'email'=>$data['email'],'password'=>$data['password'],'status'=>1
        ]))
       {
       
       toastr()->success('Login Successfully !!');
       return redirect()->route('dashboard');
      }else{
        toastr()->warning('Please provide valid email or password');
        return redirect()->back();
        }
     }

     return view('admin.user.login');
    }

   


    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    

    public function updateAdminPassword(){
      $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
     return view('admin.user.change_password',compact('adminDetails'));
   }

    public function chkCurrentPassword(Request $request){
    $data = $request->all();
    //echo "<pre>";print_r($data);
    // echo "<pre>";print_r(Auth::guard('admin')->user());die;
    if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
    return true;
    }
    else{
    return false;
   }
   }


   // ===============  updare password ===================
  public function updateCurrentPassword(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>";print_r($data);die;
        //check if current password in correct
        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){

           //check if new and confirm password is matching
            if($data['confirm_password'] == $data['new_password']){
                Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
              toastr()->success('Password has been Update Successfully!');
               return redirect()->back();
            }else{
                toastr()->warning('New Password & Confirm Password does not match!');
                return redirect()->back();
            }
           }
           toastr()->warning('Current password is Incorrect !');
         return redirect()->back();
    }
   }



  // ===============  admin can be change details ===================
 public function updateProfile(Request $request){
    if($request->isMethod('post')){
     $data = $request->all();
       //echo "<pre>";print_r($data);die;

    if($request->hasFile('image')){
      $image_tmp = $request->file('image');
      if($image_tmp->isValid()){
        $extension = $image_tmp->getClientOriginalExtension();                            
        $imageName = rand(111,99999).'.'.$extension;

        $imagePath = 'images/user/'.$imageName;
        Image::make($image_tmp)->save($imagePath);
        $data['image'] = $imageName;
       }
       }else if(!empty($data['current_image'])){
        $imageName = $data['current_image'];
       }else{
        $imageName = "";  
        }

     //Update Admin Details
     Admin::where('email',Auth::guard('admin')->user()->email)
     ->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'designation'=>$data['designation'],'dob'=>$data['dob'],'join_date'=>$data['join_date'],'salary'=>$data['salary'],'image'=>$imageName]);

      toastr()->success('Admin Details Update Successfully!');
     return redirect()->back();

    }
   return view('admin.user.update_profile');
}



public function create(){
    return view('admin.user.create_user');
}

public function index(){
     $users = Admin::orderBy('id','Desc')->where('id', '!=', Auth::guard('admin')->id())->get();
    return view('admin.user.list_user',compact('users'));
}

 public function getReporter(){
  $reporter = Admin::orderBy('id','Desc')->where('role_id','4')->get();
  return view('admin.user.list_reporter',compact('reporter'));  
 }

 public function store(Request $request){
   $users = new Admin();
   $users->name = $request->name;
   $users->mobile = $request->mobile;
   $users->email = $request->email;
   $users->designation = $request->designation;
   $users->role_id = $request->role_id;
   $users->password = bcrypt($request->password);
   $users->dob = $request->dob;
   $users->address = $request->address;
   $users->join_date = $request->join_date;
   $users->salary = $request->salary;
    if($request->hasFile('image')){
      $image_tmp = $request->file('image');
      if($image_tmp->isValid()){
        $extension = $image_tmp->getClientOriginalExtension();                            
        $imageName = rand(111,99999).'.'.$extension;
        $imagePath = 'images/user/'.$imageName;
        Image::make($image_tmp)->resize(100,100)->save($imagePath);
        $users['image'] = $imageName;
      }
    }
   $users->save();
   toastr()->success('User Create has been successfully !!');
   return redirect()->back();
 }


     public function destroy($id){
        $data = Admin::find($id);
        $data->delete();
        toastr()->success('Data Deleted successfully. !!');
        return redirect()->back();
     }

 //change user status
 public function changeUserStatus(Request $request){
        $id = $request->get('user_id');
        $data = Admin::find($id);
        if($data->status == 1) {
        $data->status = 0;
        }else {
        $data->status = 1;
        }
        $data->update();
        toastr()->success('Data Change successfully. !!');
        return back();
    }


   public function edit($id){
    $user = Admin::find($id);
    return view('admin.user.user_edit')->with('user',$user);
}

  public function update(Request $request,$id){
   $users = Admin::find($id);
   $users->name = $request->name;
   $users->mobile = $request->mobile;
   $users->email = $request->email;
   $users->designation = $request->designation;
   $users->role_id = $request->role_id;
   $users->dob = $request->dob;
   $users->address = $request->address;
   $users->join_date = $request->join_date;
   $users->salary = $request->salary;
   $users->update();
   toastr()->success('Data Update successfully. !!');
   return redirect()->route('user.index');
 }

}
