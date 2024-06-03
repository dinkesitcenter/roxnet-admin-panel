<?php

use Illuminate\Support\Facades\Route;
use Modules\Barcode\Livewire\Pages\ShowBarcode;
use App\Livewire\Dashboard;

Route::view('/', 'welcome');
// Route::view('/', 'layouts/ruangadmin');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    // Route::view('/dashboard', 'livewire/pages/admin/dashboard')->name('dashboard');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

// Route::view('/','layouts/admin');

require __DIR__.'/auth.php';