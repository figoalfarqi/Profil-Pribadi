<?php

use Illuminate\Support\Facades\Route;
use App\Http\livewire\Profil;
use App\Http\livewire\SosialMedia;
use App\Http\livewire\Keahlian;
use App\Http\livewire\Pendidikan;
use App\Http\livewire\Pengalaman;
use App\Http\livewire\Proyek;
use App\Http\livewire\TentangSaya;

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/admin')->group(function(){
    Route::get('tabel-profil', Profil::class)->name('admin.profil');
    Route::get('tabel-sosial-media', SosialMedia::class)->name('admin.sosial-media');
    Route::get('tabel-keahlian', Keahlian::class)->name('admin.keahlian');
    Route::get('tabel-pendidikan', Pendidikan::class)->name('admin.pendidikan');
    Route::get('tabel-pengalaman', Pengalaman::class)->name('admin.pengalaman');
    Route::get('tabel-proyek', Proyek::class)->name('admin.proyek');
    Route::get('tabel-tentang-saya', TentangSaya::class)->name('admin.tentang-saya');
});

