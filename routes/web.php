<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SubscriberController;

// ========================================
// PUBLIC ROUTES
// ========================================

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public pages routes
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/sport', [PagesController::class, 'sport'])->name('sport');
Route::get('/shahid', [PagesController::class, 'shahid'])->name('shahid');
Route::get('/ai', [PagesController::class, 'ai'])->name('ai');
Route::get('/amusing', [PagesController::class, 'amusing'])->name('amusing');

// Detail posts
Route::get('/article/{slug}', [PagesController::class, 'article'])->name('article');
Route::get('/tag/{name}', [PagesController::class, 'tag'])->name('tag');

// Public actions
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('store.comment');
Route::post('/comments/{comment}/react', [CommentController::class, 'react'])->name('comments.react');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Static pages
Route::get('/policy', [PagesController::class, 'policy'])->name('policy');
Route::get('/staffer', [PagesController::class, 'staffer'])->name('staffer');

// Language switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar', 'fr'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');

// ========================================
// ADMIN ONLY ROUTES
// ========================================

Route::middleware(['auth', 'admin:admin'])->group(function () {
    
    // User management (admin only)
    Route::get('/admin/users/index', [AdminController::class, 'showuser'])->name('showuser');
    Route::get('/admin/users/create', [AdminController::class, 'createuser'])->name('createuser');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'edituser'])->name('edituser');
    Route::post('/admin/users/store', [AdminController::class, 'storeuser'])->name('storeuser');
    Route::post('/admin/users/update/{id}', [AdminController::class, 'updateuser'])->name('updateuser');
    Route::get('/admin/users/delete/{id}', [AdminController::class, 'deleteuser'])->name('deleteuser');
    
    // Comments management (admin only)
    Route::get('/admin/comments', [AdminController::class, 'showcomment'])->name('showcomment');
    Route::delete('/admin/comments/{id}', [AdminController::class, 'destroycomment'])->name('comments.destroy');
    
    // Subscribers management (admin only)
    Route::get('/admin/subscribe', [AdminController::class, 'showsubscribe'])->name('showsubscribe');
    Route::delete('/admin/subscribers/{id}', [AdminController::class, 'destroysubscriber'])->name('destroysubscriber');
    
    // Contact messages (admin only)
    Route::get('/admin/contacts/new-count', [ContactController::class, 'newCount'])->name('contacts.new-count');
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/admin/contacts/{contact}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');
});

// ========================================
// ADMIN AND CREATOR ROUTES
// ========================================

Route::middleware(['auth', 'admin:admin,creator'])->group(function () {
    
    // Dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    
    // TinyMCE upload
    Route::post('/tinymce-upload', [AdminController::class, 'upload'])->name('tinymce.upload');
    
    // Category management
    Route::get('/admin/category/index', [AdminController::class, 'showcategory'])->name('showcategory');
    Route::get('/admin/category/create', [AdminController::class, 'createcategory'])->name('createcategory');
    Route::get('/admin/category/edit/{id}', [AdminController::class, 'editcategory'])->name('editcategory');
    Route::post('/admin/category/store', [AdminController::class, 'storecategory'])->name('storecategory');
    Route::post('/admin/category/update/{id}', [AdminController::class, 'updatecategory'])->name('updatecategory');
    Route::get('/admin/category/delete/{id}', [AdminController::class, 'deletecategory'])->name('deletecategory');
    
    // Subcategory management
    Route::get('/admin/subcategory/index', [AdminController::class, 'showsubcategory'])->name('showsubcategory');
    Route::get('/admin/subcategory/create', [AdminController::class, 'createsubcategory'])->name('createsubcategory');
    Route::get('/admin/subcategory/edit/{id}', [AdminController::class, 'editsubcategory'])->name('editsubcategory');
    Route::post('/admin/subcategory/store', [AdminController::class, 'storesubcategory'])->name('storesubcategory');
    Route::post('/admin/subcategory/update/{id}', [AdminController::class, 'updatesubcategory'])->name('updatesubcategory');
    Route::get('/admin/subcategory/delete/{id}', [AdminController::class, 'deletesubcategory'])->name('deletesubcategory');
    
    // Post management
    Route::get('/admin/post/index', [AdminController::class, 'showpost'])->name('showpost');
    Route::get('/admin/post/create', [AdminController::class, 'createpost'])->name('createpost');
    Route::get('/admin/post/edit/{id}', [AdminController::class, 'editpost'])->name('editpost');
    Route::post('/admin/post/store', [AdminController::class, 'storepost'])->name('storepost');
    Route::post('/admin/post/update/{id}', [AdminController::class, 'updatepost'])->name('updatepost');
    Route::get('/admin/post/delete/{id}', [AdminController::class, 'deletepost'])->name('deletepost');
});

// ========================================
// AUTHENTICATED USER ROUTES (ALL ROLES)
// ========================================

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});
