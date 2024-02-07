<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Auth\Login as AuthLogin;
use App\Livewire\Dashboard;
use App\Livewire\Konfirmasi;
use App\Livewire\Login;
use App\Livewire\Maps;
use App\Livewire\Sekolah;
use App\Livewire\Siswa;
use App\Livewire\SuperAdmin;
use App\Livewire\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return redirect('dashboard');
});


Route::middleware('auth')->group( function() { 
    Route::get('dashboard',Dashboard::class)->name('dashboard');
    Route::get('maps',Maps::class)->name('maps');

    Route::get('konfirmasi',Konfirmasi::class)->name('konfirmasi');
    Route::get('superadmin',SuperAdmin::class)->name('superadmin');
    Route::get('sekolah',Sekolah::class)->name('sekolah');
    Route::get('siswa',Siswa::class)->name('siswa');
});

// Route::get('login',Login::class)->name('login')->middleware('guest');

Route::group(['middleware' => 'guest'], function(){

    //register
    // Route::get('/register', 'auth.register')
    // ->layout('layouts.app')->name('auth.register');

    //login
    Route::get('/login',Login::class)->name('login');

});

