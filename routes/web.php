<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\GrowthController;
use App\Http\Controllers\UserController;
use App\Models\Balita;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/user-agenda', [HomeController::class, 'agenda'])->name('agenda.user');
Route::get('/artikel', [HomeController::class, 'artikel'])->name('artikel');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	Route::get('map', function () {
		return view('pages.maps');
	})->name('map');
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');
	Route::get('table-list', function () {
		return view('pages.tables');
	})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	// Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
	// Balita
	Route::get('balita', [BalitaController::class, 'index'])->name('balita');
	// Route::get('balita/crate', [BalitaController::class, 'create'])->name('balita.create');
	Route::post('/balita', [BalitaController::class, 'store']);

	// Tumbuh Kembang
	Route::get('growth/{id}/create', [GrowthController::class, 'create'])->name('growth.create');
	Route::post('growth/', [GrowthController::class, 'store']);
	Route::delete('/growth/{id}', [AdminController::class, 'growthDestroy']);
	Route::get('growth/{id}/edit', [GrowthController::class, 'edit'])->name('growth.edit');
	Route::put('growth/{id}/update', [GrowthController::class, 'update']);

	// Agenda (User)
	Route::get('kegiatan', [UserController::class, 'agenda'])->name('kegiatan');
	Route::post('kegiatan/{id}', [UserController::class, 'participate']);

	// Balita
	Route::get('balita/{id}/growth', [AdminController::class, 'growthIndex'])->name('balita.growth');
	Route::get('balita/{id}', [AdminController::class, 'balitaDetail'])->name('balita.detail');
	Route::get('balita/{id}/edit', [BalitaController::class, 'edit'])->name('balita.edit');
	Route::put('/balita/{id}/update', [BalitaController::class, 'update']);

	// Home
	Route::get('home', [AdminController::class, 'index'])->name('home');

	Route::get('chartstatus', [UserController::class, 'chart'])->name('chart');
});

Route::group(['middleware' => 'admin'], function () {
	// Agenda
	Route::get('agenda', [AgendaController::class, 'index'])->name('agenda');
	Route::get('agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
	Route::post('agenda', [AgendaController::class, 'store']);
	Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']);
	Route::get('agenda/{id}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
	Route::put('agenda/{id}/update', [AgendaController::class, 'update']);

	// User Data
	Route::get('users', [AdminController::class, 'userIndex'])->name('users.index');
	Route::get('users/create', [AdminController::class, 'userCreate'])->name('users.create');
	Route::post('/users', [AdminController::class, 'userStore']);
	Route::get('users/{id}/edit', [AdminController::class, 'userEdit'])->name('users.edit');
	Route::put('users/{id}/update', [AdminController::class, 'userUpdate']);
	Route::delete('users/{id}', [AdminController::class, 'userDestroy']);

	// Balita Data
	Route::get('balita', [AdminController::class, 'balitaIndex'])->name('balita.index');
	Route::delete('/balita/{id}', [AdminController::class, 'balitaDestroy']);

	// Report
	Route::get('laporan', [AdminController::class, 'report'])->name('report');
});
