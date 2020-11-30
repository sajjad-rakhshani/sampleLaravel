<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = \Illuminate\Support\Facades\Auth::user();
    $posts = \App\Models\Post::all();
    return view('home', ['user'=>$user->name, 'posts'=>$posts]);

})->middleware('auth');
Route::get('/home' , function (){
    return redirect('/');
});
Route::get('/logout', function (){
   \Illuminate\Support\Facades\Auth::logout();
   return redirect('');
});
Route::get('/add_post', function (){
   return view('create');
})->middleware('auth');
Route::get('/delete_post/{id}', function ($id){
    \App\Models\Post::destroy($id);
    return redirect('/');
})->middleware('auth');
Route::get('/edit_post/{id}', function ($id){
   return view('create', ['post'=>\App\Models\Post::find($id)]);
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('posts',\App\Http\Controllers\PostController::class);
