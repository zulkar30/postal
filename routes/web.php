<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\LansiaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TelegramController;
use NotificationChannels\Telegram\Telegram;

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
    return view('auth.login');
});

// Backsite Page Start
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Page
    Route::resource('user', UserController::class);
    Route::get('/user/profile', [UserController::class, 'showUser'])->name('user.profile');
    Route::get('profile/{user}/edit', [UserController::class, 'editFoto'])->name('edit.foto');
    Route::put('profile/{user}', [UserController::class, 'updateFoto'])->name('update.foto');

    // Permission Page
    Route::get('permission', [PermissionController::class, 'index'])->name('permission');

    // Role Page
    Route::get('role', [RoleController::class, 'index'])->name('role');

    // jadwal Page
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('jadwal/{jadwal}', [JadwalController::class, 'show'])->name('jadwal.show');
    Route::get('jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    // Lansia Page
    Route::get('lansia', [LansiaController::class, 'index'])->name('lansia.index');
    Route::post('lansia', [LansiaController::class, 'store'])->name('lansia.store');
    Route::get('lansia/{lansia}', [LansiaController::class, 'show'])->name('lansia.show');
    Route::get('lansia/{lansia}/edit', [LansiaController::class, 'edit'])->name('lansia.edit');
    Route::put('lansia/{lansia}', [LansiaController::class, 'update'])->name('lansia.update');
    Route::delete('lansia/{lansia}', [LansiaController::class, 'destroy'])->name('lansia.destroy');

    // Layanan Page
    Route::get('layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::post('layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('layanan/{layanan}', [LayananController::class, 'show'])->name('layanan.show');
    Route::get('layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');
    Route::get('layanan/print/{id}', [LayananController::class, 'print'])->name('layanan.print');

    // Petugas Page
    Route::get('petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::post('petugas', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('petugas/{petugas}', [PetugasController::class, 'show'])->name('petugas.show');
    Route::get('petugas/{petugas}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('petugas/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('petugas/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');
});

Route::group(['prefix' => 'telegram'], function(){
    // Telegram Page
    Route::get('telegram', [TelegramController::class, 'telegram'])->name('telegram');
    Route::get('messages', [TelegramController::class, 'messages']);
    Route::get('messages/{id}', [TelegramController::class, 'sendMessages']);
    Route::get('set-webhook', [TelegramController::class, 'setWebhook']);
    Route::get('delete-webhook', [TelegramController::class, 'deleteWebhook']);
    Route::match(['get','post'],'webhook/{token}', [TelegramController::class, 'webhook']);
});
// Backsite Page End
