<?php

use App\Http\Controllers\Admin\HddController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MotherboardController;
use App\Http\Controllers\Admin\ProcessorController;
use App\Http\Controllers\Admin\RamController;
use App\Http\Controllers\Admin\SsdController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('simulasi');
});

Route::get('/simulasi', 'User\SimulasiController@index');
Route::post('/simulasi/processor', 'User\SimulasiController@processor');

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::prefix('master_data')->group(function () {

        Route::prefix('brand')->group(function () {
            Route::get('list',              [BrandController::class, 'index'])->name('brand');
            Route::post('create',           [BrandController::class, 'create'])->name('create_brand');
            Route::get('form_update/{id}',  [BrandController::class, 'edit'])->name('form_update_brand');
            Route::post('update/{id}',      [BrandController::class, 'update'])->name('update_brand');
            Route::delete('delete/{id}',    [BrandController::class, 'delete'])->name('delete_brand');
        });

        Route::prefix('processor')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('processor');
            Route::post('create',           [ProcessorController::class, 'create'])->name('create_processor');
            Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            Route::post('update/{id}',      [ProcessorController::class, 'update'])->name('update_processor');
            Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('motherboard')->group(function () {
            Route::get('list',              [MotherboardController::class, 'index'])->name('motherboard');
            Route::post('create',           [MotherboardController::class, 'create'])->name('create_motherboard');
            Route::get('form_update/{id}',  [MotherboardController::class, 'edit'])->name('form_update_motherboard');
            Route::post('update/{id}',      [MotherboardController::class, 'update'])->name('update_motherboard');
            Route::delete('delete/{id}',    [MotherboardController::class, 'delete'])->name('delete_motherboard');
        });

        Route::prefix('ram')->group(function () {
            Route::get('list',              [RamController::class, 'index'])->name('ram');
            Route::post('create',           [RamController::class, 'create'])->name('create_ram');
            Route::get('form_update/{id}',  [RamController::class, 'edit'])->name('form_update_ram');
            Route::post('update/{id}',      [RamController::class, 'update'])->name('update_ram');
            Route::delete('delete/{id}',    [RamController::class, 'delete'])->name('delete_ram');
        });

        Route::prefix('ssd')->group(function () {
            Route::get('list',              [SsdController::class, 'index'])->name('ssd');
            Route::post('create',           [SsdController::class, 'create'])->name('create_ssd');
            Route::get('form_update/{id}',  [SsdController::class, 'edit'])->name('form_update_ssd');
            Route::post('update/{id}',      [SsdController::class, 'update'])->name('update_ssd');
            Route::delete('delete/{id}',    [SsdController::class, 'delete'])->name('delete_ssd');
        });

        Route::prefix('hdd')->group(function () {
            Route::get('list',              [HddController::class, 'index'])->name('hdd');
            Route::post('create',           [HddController::class, 'create'])->name('create_hdd');
            Route::get('form_update/{id}',  [HddController::class, 'edit'])->name('form_update_hdd');
            Route::post('update/{id}',      [HddController::class, 'update'])->name('update_hdd');
            Route::delete('delete/{id}',    [HddController::class, 'delete'])->name('delete_hdd');
        });
    });
});


Route::get('/admin', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
