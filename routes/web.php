<?php

use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DasboardUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;


/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "active"=>"Home",
        "judul"=>"Home",
        "nama"=>"fahrel",
        "jurusan"=>"teknik informatika",
        "post"=>Post::latest()->paginate(4)->withQueryString()
    ]);
});



Route::get('/author', [AuthorController::class,'index']);

Route::get('/author/{author:username}', [AuthorController::class,'author']);

Route::get('/blog', [PostController::class, 'index']);


//untuk single post blog
Route::get('/blog/{post:slug}',[PostController::class,'show']);

Route::get('/kategori/{kategori:slug}',[PostController::class,'bykategori']);

Route::get('/kategori',[PostController::class,'allkategori']);

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');//kalo belum login baru bisa ke halaman login

Route::get('/register',[RegisterController::class,'index'])->middleware('guest');

Route::post('/register',[RegisterController::class,'store']);

Route::post('/login',[LoginController::class,'loginauth']);

Route::get('/dasboard',function(Post $post){
    return view('dasboard.index',[ 
        'judul'=>'dasboard',
        'post'=>Post::latest()->where('user_id',auth()->user()->id)->get()

    ]);
})->middleware('auth');//kalo sudah login baru bisa ke dasboard

Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dasboard/post/checkSlug', [DasboardUserController::class, 'checkSlug']); 
Route::get('/dasboard/kategori/checkSlug',[AdminKategoriController::class,'checkSlug']);

Route::resource('/dasboard/post', DasboardUserController::class)->middleware('auth');

Route::resource('/dasboard/kategori', AdminKategoriController::class)->except('show')->middleware('admin');