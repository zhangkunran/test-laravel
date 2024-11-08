<?php

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
    return view('welcome');
});
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::get('/not_permission', [\App\Http\Controllers\UserController::class, 'notPermission']);
Route::get('/dev', [\App\Http\Controllers\UserController::class, 'dev']);
Route::post('/dev', [\App\Http\Controllers\UserController::class, 'executeSql']);
Route::get('/page', [\App\Http\Controllers\UserController::class, 'page']);
Route::post('/page', [\App\Http\Controllers\UserController::class, 'pageShow']);
Route::any('/export_csv', [\App\Http\Controllers\UserController::class, 'exportCsv']);
Route::any('/export_json', [\App\Http\Controllers\UserController::class, 'exportJson']);
Route::get('/only_select', [\App\Http\Controllers\UserController::class, 'onlySelect']);
