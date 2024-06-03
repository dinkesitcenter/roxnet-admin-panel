<?php

use Illuminate\Support\Facades\Route;
use Modules\Barcode\Livewire\Pages\{CreateBarcode,EditBarcode,ShowBarcode};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group([], function () {
//     Route::resource('barcode', BarcodeController::class)->names('barcode');
// });
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function(){
    Route::get('/barcode',ShowBarcode::class)->name('barcode');
    Route::get('/barcode/create', CreateBarcode::class)->name('barcode.create');
    Route::get('/barcode/{id}/edit', EditBarcode::class)->name('barcode.edit');
});