<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/login',function () {
// return redirect('/login');
// })->name('login');


// Route::get('/Admin', [HomeController::class,"Admin"] );
// Route::get('/Admin', function(){
//     return view('Admin');
// } );
// Route::get('/redirect', [HomeController::class,"redirect"] );

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//     return view('AdminDashboard.AdminPanel');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

//     return view('AdminDashboard.AdminPanel');
// })->name('dashboard');
Route::middleware(['Admin','PreventBack'])
->get('/Dashboard',[HomeController::class,"dashboard"])->name('dashboard');



//////////////////////////////////// ADMIN ROUTES
// Route::prefix('Dashboard')->name('Dashboard.')->group(['middleware'=>['Admin','PreventBack']],function () {
Route::prefix('Dashboard')->name('Dashboard.')->middleware(['Admin','PreventBack'])->group(function () {



    Route::get('users',[AdminController::class,'usersIndex'])->name("usersIndex");

    Route::get('usersSearch',[AdminController::class,'usersSearch'])->name("usersSearch");

    Route::delete('users/delete',[AdminController::class,'userDelete'])->name('userDelete');


    Route::get('plats',[AdminController::class,'platsIndex'])->name("platsIndex");

    Route::get('platsSearch',[AdminController::class,'platsSearch'])->name("platsSearch");

    Route::post('AddPlat',[AdminController::class,'AddPlat'])->name('AddPlat');
    Route::delete('DeletePlat',[AdminController::class,'DeletePlat'])->name('DeletePlat');
    Route::post('UpdatePlat',[AdminController::class,'UpdatePlat'])->name('UpdatePlat');


    Route::get('chefs',[AdminController::class,'chefsIndex'])->name("chefsIndex");
    Route::post('AddChef',[AdminController::class,'AddChef'])->name("AddChef");
    Route::delete('DeleteChef',[AdminController::class,'DeleteChef'])->name('DeleteChef');
    Route::post('UpdateChef',[AdminController::class,'UpdateChef'])->name("UpdateChef");

    Route::get('Reserve',[AdminController::class,'ReserveIndex'])->name("ReserveIndex");
    Route::get('ReserveSearch',[AdminController::class,'ReserveSearch'])->name("ReserveSearch");
    Route::delete('DeleteReserve',[AdminController::class,'DeleteReserve'])->name('DeleteReserve');

    Route::get('Orders',[AdminController::class,'OrdersIndex'])->name("OrdersIndex");
    Route::get('OrdersSearch',[AdminController::class,'OrdersSearch'])->name("OrdersSearch");
    Route::delete('DeleteOrder',[AdminController::class,'DeleteOrder'])->name('DeleteOrder');


});


Route::post('/Reserve',[HomeController::class,'Reserve'])->name("Reserve");


//User Login


Route::group(['middleware'=>['user','PreventBack']],function () {


        Route::post('/AddtoCart',[UserController::class,'AddtoCart'])->name("AddtoCart");
        Route::get('/ViewCart',[UserController::class,'ViewCart'])->name("ViewCart");
        Route::get('/ViewOrders',[UserController::class,'ViewOrders'])->name("ViewOrders");
        Route::post('/UpdateQuantity',[UserController::class,'UpdateQuantity'])->name("UpdateQuantity");
        Route::delete('/DltPlatCart',[UserController::class,'DltPlatCart'])->name("DltPlatCart");

        Route::post('/OrderNow',[UserController::class,'OrderNow'])->name("OrderNow");

});







