<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model // 1 post 
{
    use HasFactory;
    use Sluggable;



    protected $guarded = ['id'];

    protected $with = ['user','kategori'];//untuk pengoptimalan query jadi saat model post di load table use dan kategori juga ikut di load
 
    public function scopeFilter($query, array $filter){

        $query->when($filter['cari'] ?? false, function($query,$cari){

            return  $query->where('judul', 'like', '%' . $cari . '%')
            ->orWhere('body', 'like', '%' . $cari . '%')->orwhereHas('user',function($query)use($cari){
                $query->where('name','like', '%' . $cari . '%')->orWhere('username', 'like', '%' . $cari . '%');
            })->orwhereHas('kategori',function($query)use($cari){
                $query->where('nama','like', '%' . $cari . '%');
            });
        });
 
        $query->when($filter['kategori'] ?? false, function($query,$kategori){
            return $query->whereHas('kategori',function($query)use($kategori){
                $query->where('slug',$kategori);
            });

        });

        $query->when($filter['author'] ?? false,function($query,$author){
            return $query->whereHas('user',function($query)use($author){
                $query->where('username',$author);
            
            });
        });

    }
    public function kategori(){
        return $this->belongsTo(Kategori::class);//hanya memiliki 1 kategori/1 kategori dimiliki oleh 1 post
    }

    public function user(){
        return $this->belongsTo(User::class);//hanya dimiliki 1 user/1 user dimiliki oleh 1 post
    }

    public function getRouteKeyName(){//untuk route otomatis mencarinya slug bukan id
     return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
