<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as Authenticatable;
class User  extends \Illuminate\Foundation\Auth\User //1 user
{
    use HasFactory;

    protected $guarded = ['id'];

    public function post(){
        return $this->hasMany(Post::class);//bisa memiliki banyak postingan
    }
    
}
