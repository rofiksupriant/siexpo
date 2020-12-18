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

Route::get('/admin', function () {
    return view('layouts.admin');
});

Route::get('/admin/processor', 'Admin\ProcessorController@index')->name('processor');
Route::post('/admin/create_processor', [ProcessorController::class, 'create']);

Route::get('/admin', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
