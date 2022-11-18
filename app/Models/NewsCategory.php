<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NewsCategory extends Model implements HasMedia
{
     use HasFactory,InteractsWithMedia;
     protected $fillable = ['category_id', 'news_id'];


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


      public function categoryId(){
        return$this->belongsTo(Category::class,'category_id');
      }

    public function newsId(){
        return$this->belongsTo(News::class,'news_id');
    }
  
}
