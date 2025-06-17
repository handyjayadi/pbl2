<?php

use App\Http\Controllers\userCruds;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\TendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\AktivitasController;



Route::get('/booking', function () {
    return view('booking');
})->name('booking');


Route::get('/review', function () {
    return view('review');
})->name('review');

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
    Route::get('/admin', function () {
        return view('admin.adminUtama');})->name('adminDashboard');
        
    Route::resource('tendas', TendaController::class)->except(['create', 'edit', 'show']);
    Route::get('/tenda', [TendaController::class, 'index'])->name('tenda.index');
    });


    Route::get('/tendas', [TendaController::class, 'tenda'])->name('tenda.user');
    
    Route::get('/gallery', [GaleriController::class, 'galeriuser'])->name('gallery');

    Route::get('/', [homepageController::class, 'index'])->name('homepage');


require __DIR__.'/auth.php';
