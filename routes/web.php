<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Auth\Events\Login;
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


// Front end
// Home Front


// Tentang kami
// Route::get('/tentang_kami', [FrontController::class, 'tentang_kami']);

// Login
Route::group(['middleware' => ['web']], function(){

Route::get('/admin', [AdminController::class, 'admin'])->name('login');
Route::post('/postlogin', [AdminController::class, 'postlogin']);
Route::get('/logout_admin', [AdminController::class, 'logout_admin']);
});
// admin
Route::group(['middleware' => ['auth','web','CekLevel:admin']], function(){


Route::get('/dashboard', [DashboardController::class, 'dashboard']);

// 
Route::get('/artikel_end', [ArtikelController::class, 'artikel']);
Route::post('store', [ArtikelController::class, 'store']);
Route::get('destroy/{id}', [ArtikelController::class, 'destroy'])->name('destroy');
Route::get('/show_artikel_end/{id}', [ArtikelController::class, 'show']);
Route::put('edit_artikel_end/{id}', [ArtikelController::class, 'edit']);

// 
Route::get('/users_end', [UsersController::class, 'users']);
Route::get('delete_user_end/{id}', [UsersController::class, 'delete_user']);
Route::get('/show_user_end/{id}', [UsersController::class, 'show_user']);
Route::put('update_user_end/{id}', [UsersController::class, 'update_user']);
Route::post('insert_user_end', [UsersController::class, 'insert_user']);
// print
Route::get('print_user', [UsersController::class, 'print_user']);
});

// register Front
Route::post('register', [LoginController::class, 'register']);

// Login Front
Route::post('loged', [LoginController::class, 'loged'])->name('loged');

// Insert artikel page
Route::get('insert_artikel', [FrontController::class, 'insert_artikel']);

// Logout Front
Route::get('/logouted', [LoginController::class, 'logouted']);

Route::group(['middleware' => ['web', 'CekPengunjung:pengunjung']], function(){

Route::get('/', [FrontController::class , 'home']);

// Artikel Front
Route::get('/artikel',[FrontController::class, 'artikel']);
Route::get('/preveiew_artikel/{id}', [FrontController::class, 'preveiew']);
Route::post('/process_insert_artikel', [FrontController::class, 'process_insert_artikel']);
Route::get('/delete_editor_artikel/{id}', [FrontController::class, 'delete_editor_artikel']);
});