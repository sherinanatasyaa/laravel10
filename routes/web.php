<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\GroupsController;



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

Route::get('/', [LoadingController::class, 'index']);
Route::get('/index', [LoginController::class, 'index']);
Route::post('/index', [LoginController::class, 'login']);
Route::post('/dashboard', [LoginController::class, 'dashboard']);

Route::get('/friends/show/{id}', [CobaController::class, 'show']);
Route::get('/groups/create', [GroupsController::class, 'create']);

Route::get('/groups/showaddmember/{id}', [GroupsController::class, 'showaddmember']);
Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/addmember/{group}', [GroupsController::class, 'updatemember']);
Route::post('/groups/store', [GroupsController::class, 'store']);
Route::get('/groups/showmember/{id}', [GroupsController::class, 'show']);

Route::get('/friends/logout', [CobaController::class, 'logout']);
Route::get('/groups/logout', [CobaController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resources([
    'friends' => CobaController::class,
    '/groups' => GroupsController::class,
]);