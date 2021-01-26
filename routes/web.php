<?php

use App\Http\Controllers\Admin\HddController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MotherboardController;
use App\Http\Controllers\Admin\ProcessorController;
use App\Http\Controllers\Admin\RamController;
use App\Http\Controllers\Admin\SsdController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CasingController;
use App\Http\Controllers\Admin\FanController;
use App\Http\Controllers\Admin\KeyboardController;
use App\Http\Controllers\Admin\MonitorController;
use App\Http\Controllers\Admin\MouseController;
use App\Http\Controllers\Admin\MousePadController;
use App\Http\Controllers\Admin\VgaController;
use App\Http\Controllers\User\SimulasiController;
use App\Models\User;
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
})->name("home");

Route::get('/simulasi', 'User\SimulasiController@index');
// Route::post('/simulasi/processor', 'User\SimulasiController@processor');

Auth::routes();

Route::prefix('user')->group(function () {
    Route::prefix('simulasi')->group(function () {
        Route::get('/',                 [SimulasiController::class, 'index']);
        Route::post('processors',       [SimulasiController::class, 'processors']);
        Route::post('motherboards',     [SimulasiController::class, 'motherboards']);
        Route::get('form_update/{id}',  [SimulasiController::class, 'edit']);
        Route::post('create',           [SimulasiController::class, 'create'])->name('create_simulasi');
    });
});

Route::prefix('admin')->middleware('auth', 'role:' . User::ADMIN_ROLE)->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::prefix('master_data')->group(function () {

        Route::prefix('brand')->group(function () {
            Route::get('/',                 [BrandController::class, 'index'])->name('brand');
            Route::post('create',           [BrandController::class, 'create'])->name('create_brand');
            Route::get('form_update/{id}',  [BrandController::class, 'edit'])->name('form_update_brand');
            Route::post('update/{id}',      [BrandController::class, 'update'])->name('update_brand');
            Route::delete('delete/{id}',    [BrandController::class, 'delete'])->name('delete_brand');
        });

        Route::prefix('processor')->group(function () {
            Route::get('/',                 [ProcessorController::class, 'index'])->name('processor');
            Route::post('create',           [ProcessorController::class, 'create'])->name('create_processor');
            Route::get('form_update/{id}',  [ProcessorController::class, 'edit'])->name('form_update_processor');
            Route::post('update/{id}',      [ProcessorController::class, 'update'])->name('update_processor');
            Route::delete('delete/{id}',    [ProcessorController::class, 'delete'])->name('delete_processor');
        });

        Route::prefix('motherboard')->group(function () {
            Route::get('/',                 [MotherboardController::class, 'index'])->name('motherboard');
            Route::post('create',           [MotherboardController::class, 'create'])->name('create_motherboard');
            Route::get('form_update/{id}',  [MotherboardController::class, 'edit'])->name('form_update_motherboard');
            Route::post('update/{id}',      [MotherboardController::class, 'update'])->name('update_motherboard');
            Route::delete('delete/{id}',    [MotherboardController::class, 'delete'])->name('delete_motherboard');
        });

        Route::prefix('ram')->group(function () {
            Route::get('/',                 [RamController::class, 'index'])->name('ram');
            Route::post('create',           [RamController::class, 'create'])->name('create_ram');
            Route::get('form_update/{id}',  [RamController::class, 'edit'])->name('form_update_ram');
            Route::post('update/{id}',      [RamController::class, 'update'])->name('update_ram');
            Route::delete('delete/{id}',    [RamController::class, 'delete'])->name('delete_ram');
        });

        Route::prefix('ssd')->group(function () {
            Route::get('/',                 [SsdController::class, 'index'])->name('ssd');
            Route::post('create',           [SsdController::class, 'create'])->name('create_ssd');
            Route::get('form_update/{id}',  [SsdController::class, 'edit'])->name('form_update_ssd');
            Route::post('update/{id}',      [SsdController::class, 'update'])->name('update_ssd');
            Route::delete('delete/{id}',    [SsdController::class, 'delete'])->name('delete_ssd');
        });

        Route::prefix('hdd')->group(function () {
            Route::get('/',                 [HddController::class, 'index'])->name('hdd');
            Route::post('create',           [HddController::class, 'create'])->name('create_hdd');
            Route::get('form_update/{id}',  [HddController::class, 'edit'])->name('form_update_hdd');
            Route::post('update/{id}',      [HddController::class, 'update'])->name('update_hdd');
            Route::delete('delete/{id}',    [HddController::class, 'delete'])->name('delete_hdd');
        });

        Route::prefix('keyboard')->group(function () {
            Route::get('/',                 [KeyboardController::class, 'index'])->name('keyboard');
            Route::post('create',           [KeyboardController::class, 'create'])->name('create_keyboard');
            Route::get('form_update/{id}',  [KeyboardController::class, 'edit'])->name('form_update_keyboard');
            Route::post('update/{id}',      [KeyboardController::class, 'update'])->name('update_keyboard');
            Route::delete('delete/{id}',    [KeyboardController::class, 'delete'])->name('delete_keyboard');
        });

        Route::prefix('monitor')->group(function () {
            Route::get('/',                 [MonitorController::class, 'index'])->name('monitor');
            Route::post('create',           [MonitorController::class, 'create'])->name('create_monitor');
            Route::get('form_update/{id}',  [MonitorController::class, 'edit'])->name('form_update_monitor');
            Route::post('update/{id}',      [MonitorController::class, 'update'])->name('update_monitor');
            Route::delete('delete/{id}',    [MonitorController::class, 'delete'])->name('delete_monitor');
        });

        Route::prefix('vga')->group(function () {
            Route::get('/',                 [VgaController::class, 'index'])->name('vga');
            Route::post('create',           [VgaController::class, 'create'])->name('create_vga');
            Route::get('form_update/{id}',  [VgaController::class, 'edit'])->name('form_update_vga');
            Route::post('update/{id}',      [VgaController::class, 'update'])->name('update_vga');
            Route::delete('delete/{id}',    [VgaController::class, 'delete'])->name('delete_vga');
        });

        Route::prefix('mouse')->group(function () {
            Route::get('/',                 [MouseController::class, 'index'])->name('mouse');
            Route::post('create',           [MouseController::class, 'create'])->name('create_mouse');
            Route::get('form_update/{id}',  [MouseController::class, 'edit'])->name('form_update_mouse');
            Route::post('update/{id}',      [MouseController::class, 'update'])->name('update_mouse');
            Route::delete('delete/{id}',    [MouseController::class, 'delete'])->name('delete_mouse');
        });

        Route::prefix('mousePad')->group(function () {
            Route::get('/',                 [MousePadController::class, 'index'])->name('mousePad');
            Route::post('create',           [MousePadController::class, 'create'])->name('create_mousePad');
            Route::get('form_update/{id}',  [MousePadController::class, 'edit'])->name('form_update_mousePad');
            Route::post('update/{id}',      [MousePadController::class, 'update'])->name('update_mousePad');
            Route::delete('delete/{id}',    [MousePadController::class, 'delete'])->name('delete_mousePad');
        });

        Route::prefix('fan')->group(function () {
            Route::get('/',                 [FanController::class, 'index'])->name('fan');
            Route::post('create',           [FanController::class, 'create'])->name('create_fan');
            Route::get('form_update/{id}',  [FanController::class, 'edit'])->name('form_update_fan');
            Route::post('update/{id}',      [FanController::class, 'update'])->name('update_fan');
            Route::delete('delete/{id}',    [FanController::class, 'delete'])->name('delete_fan');
        });

        Route::prefix('casing')->group(function () {
            Route::get('/',                 [CasingController::class, 'index'])->name('casing');
            Route::post('create',           [CasingController::class, 'create'])->name('create_casing');
            Route::get('form_update/{id}',  [CasingController::class, 'edit'])->name('form_update_casing');
            Route::post('update/{id}',      [CasingController::class, 'update'])->name('update_casing');
            Route::delete('delete/{id}',    [CasingController::class, 'delete'])->name('delete_casing');
        });
    });
});

Auth::routes();
