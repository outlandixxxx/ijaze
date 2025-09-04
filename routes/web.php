<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/breakingnews', [PagesController::class, 'breakingnews'])->name('breakingnews');