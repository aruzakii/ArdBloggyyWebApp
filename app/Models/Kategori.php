<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kategori extends Model //1 kategori
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ['id'];

    public function post(){
        return $this->hasMany(Post::class);//bisa dimiliki oleh banyak postingan
    }

    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
