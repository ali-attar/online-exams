<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\classController;

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


Route::view('/', 'welcome');

Route::post('/permision', [adminController::class,'permision'])->name('permision');

Route::view('/permision', 'admin.permision')->name('permision_view');

Route::view('/home', 'welcome')->name('home');

Route::view('/home/users', 'admin.users')->name('users');

Route::get('/home/users/change/{id}',[adminController::class, 'changeUserpage'])->name('page_change_user');

Route::post('/home/users/change/{id}', [adminController::class, 'changeUser'])->name('change_user');

Route::get('/home/users/change/{id}/{per}', [adminController::class, 'deletePermisionUser'])->name('deletePermisionUser');

Route::get('/home/users/del/{id}', [adminController::class, 'deleteUser'])->name('delete_user');

Route::get('/class', [classController::class, 'class'])->name('class');

Route::view('/class/create', 'manager.createClass')->name('create_class_view');

Route::post('/class/create', [classController::class ,'create'])->name('create_class');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
