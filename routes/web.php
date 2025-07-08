<?php

use App\Http\Controllers\userCruds;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\AktivitasController;







Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth',RoleMiddleware::class . ':admin',])->group(function () {
    Route::get('/userManagement', [userCruds::class, 'index'])->name('admin.userManagement'); 
    Route::resource('/users', \App\Http\Controllers\userCruds::class);
    

    });

Route::middleware(['auth',RoleMiddleware::class . ':admin',])->group(function () {
    Route::get('/aktivitasManagement', [AktivitasController::class, 'index'])->name('admin.aktivitasManagement'); 
    Route::resource('/aktivitas', \App\Http\COntrollers\AktivitasController::class);

    });
Route::middleware(['auth',RoleMiddleware::class . ':admin',])->group(function () {
    Route::resource('galeri', GaleriController::class)->except(['create', 'edit', 'show']);
    });

    Route::middleware(['auth',RoleMiddleware::class . ':admin',])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('adminDashboard');
    Route::resource('tendas', TendaController::class)->except(['create', 'edit', 'show']);
    Route::get('/tenda', [TendaController::class, 'index'])->name('tenda.index');
    });

    Route::middleware('auth')->group(function () {
    Route::get('/ulasan/{booking}', [UlasanController::class, 'create'])->name('ulasan.create');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    }); 

    Route::get('/review', [UlasanController::class, 'index'])->name('review');
    Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/reviews', [UlasanController::class, 'indexadmin'])->name('admin.reviewManagement');
    Route::delete('/reviews/{id}', [UlasanController::class, 'destroy'])->name('admin.reviews.destroy');
    });


    Route::get('/tendas', [TendaController::class, 'tenda'])->name('tenda.user');
    
    Route::get('/gallery', [GaleriController::class, 'galeriuser'])->name('gallery');

    Route::get('/', [homepageController::class, 'index'])->name('homepage');


Route::middleware(['auth'])->group(function () {
   
    Route::post('/booking/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
    Route::get('/booking/success', [BookingController::class, 'paymentSuccess'])->name('booking.success');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
    Route::post('/get-snap-token', [BookingController::class, 'getSnapToken']);
    Route::get('/admin/transaksi', [BookingController::class, 'admin'])->name('admin.bookManagement');


        
    });
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');


    


    // routes/web.php
        use Illuminate\Support\Facades\Log;

        Route::get('/test-log', function () {
            Log::debug('Ini debug dari test-log');
            return 'Cek log';
        });



require __DIR__.'/auth.php';
