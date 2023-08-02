<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama'=>'programing',
            'slug'=>'programing'
        ]);

        Kategori::create([
            'nama'=>'desain',
            'slug'=>'desain'
        ]);

        Kategori::create([
            'nama'=>'personal',
            'slug'=>'personal'
        ]);

        Kategori::create([
            'nama'=>'politik',
            'slug'=>'politik'
        ]);

        Kategori::create([
            'nama'=>'teknologi',
            'slug'=>'teknologi'
        ]);

        
        Kategori::create([
            'nama'=>'psikologi',
            'slug'=>'psikologi'
        ]);

        
        
        Kategori::create([
            'nama'=>'hiburan',
            'slug'=>'hiburan'
        ]);

    }
}
