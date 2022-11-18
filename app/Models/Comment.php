<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;
class Comment extends Model
{
    use HasFactory;
     protected $table = 'comments';
    protected $fillable = ['user_id', 'post_id','comment_body'];


    
     public function news(){
      return $this->belongsTo(News::class,'post_id','id');
    }

     public function users(){
      return $this->belongsTo(User::class,'user_id');
    }

     public static function userCommentPost(){
        if(Auth::check()){
         $userCommentPost = Comment::with(['news'=>function($query){
         $query->select('id','title');
         }])
         ->select('id','user_id','post_id','comment_body')
         ->where('user_id',Auth::user()->id)->orderBy('id','Desc')->get()->toArray();
        }else{
         $userCommentPost = Comment::with(['news'=>function($query){
         $query->select('id','title');
         }])->where('session_id',Session::get('session_id'))->orderBy('id','Desc')->get()->toArray();
      }
        return $userCommentPost;
 

   }

}
