<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

     protected $guarded = ['admin'];


     protected $fillable = [
     'question','yes_vote','no_vote','no_comment','status','created_at','updated_at',
     ];


}
