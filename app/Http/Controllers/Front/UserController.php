<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;
use Auth;
use Session;
class UserController extends Controller
{

   public function loginUser(Request $request){
    if($request->isMethod('post')){
      $data = $request->all();
       if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){        
         toastr()->success('Logged in Successfully!');
          return back();
      }
      else{
         toastr()->warning('The email or password is incorrect, please try again');
         return back();
      }
    }

    
    return view('pages.login');
  }


 public function userRegister(Request $request){
      if($request->isMethod('post')){
         $data = $request->all();
         $usersCount = User::where('email',$data['email'])->count();
          if($usersCount>0){
             toastr()->warning('Email already exists!');
             return back();
          }else{

             $user = new User;
             $user->name = $data['name'];
             $user->email = $data['email'];
             $user->password = bcrypt($data['password']);
             $user->save();
             toastr()->success('Successfully!');
             return back();
         }  
      }
    }

public function signOut() {
    Session::flush();
    Auth::logout();
    toastr()->success('Logged out Successfully!');
    return Redirect('/');

    }



}
