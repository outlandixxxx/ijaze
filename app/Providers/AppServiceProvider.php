<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact; // Make sure this exists

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        // Use Bootstrap 5 for pagination
        Paginator::useBootstrap();
        
        Carbon::setLocale('ar');

        // Share unread messages count with all views
        View::composer('*', function ($view) {
            $unreadMessages = Contact::where('is_read', false)->count();
            $view->with('unreadMessages', $unreadMessages);
        });
    }
}
