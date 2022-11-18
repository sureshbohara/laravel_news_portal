<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tags;
class NewsTags extends Model
{
    use HasFactory;
    protected $fillable = ['tags_id', 'news_id'];

     public function tagsId(){
        return$this->belongsTo(Tags::class,'tags_id','id');
      }

    public function newsId(){
        return$this->belongsTo(News::class,'news_id');
    }



}
