<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/breakingnews', [PagesController::class, 'breakingnews'])->name('breakingnews');
Route::get('/sport', [PagesController::class, 'sport'])->name('sport');
Route::get('/trending', [PagesController::class, 'trending'])->name('trending');
Route::get('/ai', [PagesController::class, 'ai'])->name('ai');
Route::get('/amusing', [PagesController::class, 'amusing'])->name('amusing');
Route::get('/imagenews', [PagesController::class, 'imagenews'])->name('imagenews');


//admin

Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/category/index', [AdminController::class, 'showcategory'])->name('showcategory');
Route::get('/admin/category/create', [AdminController::class, 'createcategory'])->name('createcategory');
Route::get('/admin/category/edit', [AdminController::class, 'editcategory'])->name('editcategory');
Route::post('/admin/category/store', [AdminController::class, 'storecategory'])->name('storecategory');
Route::post('/admin/category/update', [AdminController::class, 'updatecategory'])->name('updatecategory');
Route::post('/admin/category/delete', [AdminController::class, 'deletecategory'])->name('deletecategory');



Route::get('/admin/post/index', [AdminController::class, 'showpost'])->name('showpost');
Route::get('/admin/post/create', [AdminController::class, 'createpost'])->name('createpost');
Route::get('/admin/post/edit', [AdminController::class, 'editpost'])->name('editpost');
Route::post('/admin/post/store', [AdminController::class, 'storepost'])->name('storepost');
Route::post('/admin/post/update', [AdminController::class, 'updatepost'])->name('updatepost');
Route::post('/admin/post/delete', [AdminController::class, 'deletepost'])->name('deletepost');


Route::get('/test', [AdminController::class, 'test'])->name('test');

