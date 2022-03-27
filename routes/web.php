<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,"index"] );
Route::get('/Admin', [HomeController::class,"Admin"] );
// Route::get('/Admin', function(){
//     return view('Admin');
// } );
Route::get('/redirect', [HomeController::class,"redirect"] );

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//     return view('AdminDashboard.AdminPanel');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//     return view('AdminDashboard.AdminPanel');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])
->get('/dashboard',[HomeController::class,"checkAuth"])->name('dashboard');

//////////////////////////////////// ADMIN ROUTES
Route::prefix('dashboard')->name('Dashboard.')->group(function () {
    Route::get('users',[AdminController::class,'usersIndex'])->name("usersIndex");
    Route::delete('users/delete',[AdminController::class,'userDelete'])->name('userDelete');




    Route::get('plats',[AdminController::class,'platsIndex'])->name("platsIndex");

});
