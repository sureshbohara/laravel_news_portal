<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Advertisement extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $guarded = 'admin';
    protected $fillable = ['title','link','place','status','created_by','updated_by'];


     public function registerMediaConversions(Media $media = null): void
    {

         $this->addMediaConversion('thumb')
         ->width(150)
         ->height(150)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('cube_adv');

         $this->addMediaConversion('thumb')
         ->width(1200)
         ->height(100)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('main_adv');

         $this->addMediaConversion('thumb')
         ->width(700)
         ->height(100)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('logo_side_image');

         $this->addMediaConversion('thumb')
         ->width(370)
         ->height(250)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('sidebar_image');
         
         $this->addMediaConversion('thumb')
         ->width(500)
         ->height(600)
         ->sharpen(10)
         ->quality(60)
         ->performOnCollections('notice_image');


    }
}
