<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::get('/post', function () {
    //truy vấn lấy tất cả
    $data = Post::all()->toArray();
    $data = Post::query()->get();
    //where
    $data = Post::query()->where('id', '>=', '1')
        ->get();
    //thêm
    //cách1
    // $post= new Post();
    // $post->title="bài viết số 2";
    // $post->content="nội dung bài viết số 2";
    // $post->save();
    //cách2
    // $post =Post::query()->create([
    //     'title'=>"Bài viêt số 3",
    //     'content'=>"Nội dung bài viết số 3"
    // ]);
    //sửa 
    //cách1
    // $post=  Post::query()->find(2);
    // $post->title="bài viết số 21";
    // $post->content="nội dung bài viết số 21";
    // $post->save();
    //cách2
    // $post=  Post::query()->find(2)
    // ->update([
    //     'title'=>"Bài viêt số 12",
    //     'content'=>"Nội dung bài viết số 2"
    // ]);
    //xóa
    //cứng
    // $post=  Post::query()->find(4)->delete();
    // dd($data);
    // return view('welcome');
});

// Route::get('/products',  [ProductController::class, 'index'])->name('product.index');
// Route::post('/products/create',  [ProductController::class, 'create'])->name('product.create');



Route::controller(ProductController::class)
    ->name('product.')
    ->prefix('products/')
    ->group(function (){
        Route::get('/', 'index')
            ->name('index');
        Route::get('create', 'create')
            ->name('create');
        Route::post('store', 'store')
            ->name('store');
        Route::get('{id}/edit', 'edit')
            ->name('edit');
        Route::put('{id}/update', 'update')
            ->name('update');
        Route::delete('{id}/destroy', 'destroy')
            ->name('destroy');
    });
    Route::controller(CategoryController::class)
    ->name('category.')
    ->prefix('categories/')
    ->group(function (){
        Route::get('/', 'index')
            ->name('index');
        Route::get('create', 'create')
            ->name('create');
        Route::post('store', 'store')
            ->name('store');
        Route::get('{id}/edit', 'edit')
            ->name('edit');
        Route::put('{id}/update', 'update')
            ->name('update');
        Route::delete('{id}/destroy', 'destroy')
            ->name('destroy');
    });
