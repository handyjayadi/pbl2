<?php

namespace App\Providers;

use Midtrans\Config;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

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
         Config::$serverKey = config('midtrans.server_key'); // ambil dari config
    Config::$isProduction = false; // true jika production
    Config::$isSanitized = true;
    Config::$is3ds = true;

    }
}
