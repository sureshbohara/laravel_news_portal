<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
     use HasFactory;
     use HasFactory;

     protected $guarded = 'admin';

   

     public function role(){
        return $this->belongsTo(Role::class);
    }

    
}
