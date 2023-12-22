<?php

use App\Http\Controllers\{UserController, SocialPlatformController};
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

//Homepage
Route::get('/', [UserController::class, 'homepageView'])->name('homepage');

//User related routes
Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/profile/{user:username}', [UserController::class, 'profileView'])->middleware('auth');

//Social platform link related routes
Route::get('/add-links', [SocialPlatformController::class, 'addLinksView'])->middleware('auth');
Route::post('/add-links', [SocialPlatformController::class, 'addLinks'])->middleware('auth');
Route::delete('/link/{link}', [SocialPlatformController::class, 'delete'])->middleware('can:delete,link');
Route::get('link/{link}/edit', [SocialPlatformController::class, 'editLinkView'])->middleware('can:update,link');
Route::put('/link/{link}', [SocialPlatformController::class, 'updateLink'])->middleware('can:update,link');
Route::post('/search', [SocialPlatformController::class, 'search']);





