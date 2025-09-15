<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/breakingnews', [PagesController::class, 'breakingnews'])->name('breakingnews');
Route::get('/sport', [PagesController::class, 'sport'])->name('sport');
Route::get('/trending', [PagesController::class, 'trending'])->name('trending');
Route::get('/ai', [PagesController::class, 'ai'])->name('ai');
Route::get('/amusing', [PagesController::class, 'amusing'])->name('amusing');
Route::get('/imagenews', [PagesController::class, 'imagenews'])->name('imagenews');

