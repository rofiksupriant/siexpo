<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProcessorController;
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

        Route::prefix('processor')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('processor');
            Route::post('create',           [ProcessorController::class, 'create_processor'])->name('create_processor');
            Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            Route::post('update/{id}',      [ProcessorController::class, 'update'])->name('update_processor');
            Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('motherboard')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('motherboard');
            // Route::post('create',           [ProcessorController::class, 'create_processor'])->name('create_processor');
            // Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            // Route::post('update',           [ProcessorController::class, 'update'])->name('update_processor');
            // Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('ram')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('ram');
            // Route::post('create',           [ProcessorController::class, 'create_processor'])->name('create_processor');
            // Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            // Route::post('update',           [ProcessorController::class, 'update'])->name('update_processor');
            // Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('ssd')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('ssd');
            // Route::post('create',           [ProcessorController::class, 'create_processor'])->name('create_processor');
            // Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            // Route::post('update',           [ProcessorController::class, 'update'])->name('update_processor');
            // Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('hdd')->group(function () {
            Route::get('list',              [ProcessorController::class, 'index'])->name('hdd');
            // Route::post('create',           [ProcessorController::class, 'create_processor'])->name('create_processor');
            // Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            // Route::post('update',           [ProcessorController::class, 'update'])->name('update_processor');
            // Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });
    });
});


Route::get('/admin', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
