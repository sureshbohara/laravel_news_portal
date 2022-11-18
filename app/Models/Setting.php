<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Setting extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = 'admin';


   public function registerMediaConversions(Media $media = null): void
    {
    $this->addMediaConversion('fav')
         ->width(32)
         ->height(32)
         ->sharpen(10)
         ->quality(60)
     ->performOnCollections('fav');


    $this->addMediaConversion('logo')
         ->width(150)
         ->height(150)
         ->sharpen(10)
         ->quality(60)
     ->performOnCollections('logo');

     $this->addMediaConversion('loader')
         ->width(150)
         ->height(150)
         ->sharpen(10)
         ->quality(60)
     ->performOnCollections('loader');

       $this->addMediaConversion('login_background_image')
         ->width(1200)
         ->height(600)
         ->sharpen(10)
         ->quality(60)
     ->performOnCollections('login_background_image');

    }


}
