<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
     protected $guarded = ['admin'];

    protected $fillable = ['title','slug','short_description','description','status','meta_title','meta_keyword'];


}
