<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     use HasFactory;
     protected $guarded = ['admin'];

    public function permission(){
        return $this->hasOne(Permission::class);
    }

    protected $fillable = [
     'name','status','created_at','updated_at',
     ];
}
