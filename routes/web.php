<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SubscriberController;



Route::get('/', [PagesController::class, 'index'])->name('index');
//Route::get('/breakingnews', [PagesController::class, 'breakingnews'])->name('breakingnews');
Route::get('/news', [PagesController::class, 'news'])->name('news');

Route::get('/sport', [PagesController::class, 'sport'])->name('sport');
Route::get('/shahid', [PagesController::class, 'shahid'])->name('shahid');
Route::get('/ai', [PagesController::class, 'ai'])->name('ai');
Route::get('/amusing', [PagesController::class, 'amusing'])->name('amusing');

//detail posts

Route::get('/article/{slug}', [PagesController::class, 'article'])->name('article');
Route::get('/tag/{name}', [PagesController::class, 'tag'])->name('tag');


//admin

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/category/index', [AdminController::class, 'showcategory'])->name('showcategory');
Route::get('/admin/category/create', [AdminController::class, 'createcategory'])->name('createcategory');
Route::get('/admin/category/edit/{id}', [AdminController::class, 'editcategory'])->name('editcategory');
Route::post('/admin/category/store', [AdminController::class, 'storecategory'])->name('storecategory');
Route::post('/admin/category/update/{id}', [AdminController::class, 'updatecategory'])->name('updatecategory');
Route::get('/admin/category/delete/{id}', [AdminController::class, 'deletecategory'])->name('deletecategory');



Route::get('/admin/subcategory/index', [AdminController::class, 'showsubcategory'])->name('showsubcategory');
Route::get('/admin/subcategory/create', [AdminController::class, 'createsubcategory'])->name('createsubcategory');
Route::get('/admin/subcategory/edit/{id}', [AdminController::class, 'editsubcategory'])->name('editsubcategory');
Route::post('/admin/subcategory/store', [AdminController::class, 'storesubcategory'])->name('storesubcategory');
Route::post('/admin/subcategory/update/{id}', [AdminController::class, 'updatesubcategory'])->name('updatesubcategory');
Route::get('/admin/subcategory/delete/{id}', [AdminController::class, 'deletesubcategory'])->name('deletesubcategory');



Route::get('/admin/post/index', [AdminController::class, 'showpost'])->name('showpost');
Route::get('/admin/post/create', [AdminController::class, 'createpost'])->name('createpost');
Route::get('/admin/post/edit/{id}', [AdminController::class, 'editpost'])->name('editpost');

Route::post('/admin/post/store', [AdminController::class, 'storepost'])->name('storepost');
Route::post('/admin/post/update/{id}', [AdminController::class, 'updatepost'])->name('updatepost');
Route::get('/admin/post/delete/{id}', [AdminController::class, 'deletepost'])->name('deletepost');

//subscribe

Route::get('/admin/subscribe/index', [AdminController::class, 'showsubscribe'])->name('showsubscribe');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

//comments

//subscribe

Route::get('/admin/comment/index', [AdminController::class, 'showcomment'])->name('showcomment');
//Route::post('/comments', [CommentController::class, 'subscribe'])->name('comment');



Route::get('/test', [AdminController::class, 'test'])->name('test');
//Route::post('/tinymce-upload', [AdminController::class, 'uploadImage'])->name('tinymce.upload');
Route::post('/tinymce-upload', [AdminController::class, 'upload'])->name('tinymce.upload');




/* use App\Http\Middleware\TrackVisitors;

Route::middleware([TrackVisitors::class])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/post/{slug}', [PostController::class, 'article']);
    // ... add other public routes
}); */