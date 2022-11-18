<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = ['admin'];
    protected $table = 'category_news';

    protected $fillable = [
     'name','slug','order_level','meta_keywords','meta_descriptions','status',
     ];
}
