<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\NewsCategory;
use App\Models\NewsTags;
class News extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = ['admin'];
    protected $table = 'news';


    public function registerMediaConversions(Media $media = null): void
    {

         $this->addMediaConversion('icon')
         ->width(150)
         ->height(100)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('icon_image');

         $this->addMediaConversion('thumb')
         ->width(355)
         ->height(280)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('medium_image');

         $this->addMediaConversion('thumb')
         ->width(270)
         ->height(175)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('small_image');

         $this->addMediaConversion('thumb')
         ->width(1200)
         ->height(460)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('banner_image');


    }


    protected $fillable = [
     'title','short_description','description','news_type','video_id','status','created_by','updated_by','view_count','meta_title','meta_keywords','meta_descriptions'
     ];

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function tag() {
      return $this->belongsTo(Tags::class);
    }


   public function categories()
    {
     return $this->belongsToMany(Category::class, 'news_categories', 'news_id', 'category_id');
    }


      public function tags()
    {
     return $this->belongsToMany(Tags::class, 'news_tags', 'news_id', 'tags_id');
    }



   // Likes
    public function likes(){
        return $this->hasMany('App\Models\LikeDislike','post_id')->sum('like');
    }
    // Dislikes
    public function dislikes(){
        return $this->hasMany('App\Models\LikeDislike','post_id')->sum('dislike');
    }
   

   public function comments(){
    return $this->hasMany('App\Models\Comment','post_id')->orderBy('id','desc');
   }

}