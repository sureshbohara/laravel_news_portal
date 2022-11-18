<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Category extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $guarded = ['admin'];
    protected $table = 'categories';


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->sharpen(10)
            ->quality(60)
            ->performOnCollections('icon');

    }

    protected $fillable = [
     'name','slug','parent_id','level','order_level','icon','meta_keywords','meta_descriptions','status','is_feature','is_province',
     ];


    public function categories()
    {
    return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

  public function news()
    {
        return $this->belongsToMany(News::class,'news_categories', 'category_id', 'news_id')->orderBy('id','Desc');
    }

}
