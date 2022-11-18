<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\News;
use Auth;
use Session;
class CommentController extends Controller
{
    public function postComment(Request $request){
      if(Auth::check()){
        $post = News::where('id',$request->post_id)->where('status',1)->first();
        if($post){
             Comment::create([
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
                'comment_body' => $request->comment_body
             ]);
             toastr()->success('Comment Successfully !!');
             return back(); 
        }else{
          toastr()->warning('No such post found !!');
          return back();  
        }
      }else{
        toastr()->warning('Login first to comment !!');
        return back();
     }
    }


    public function deleteCommentPost(Request $request, $id){
        $data = Comment::find($id);
        $data->delete();
        toastr()->success('Post deleted!');
      return redirect()->back();
    }

}
