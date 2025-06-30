<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
    return view('home.index');
});


route::get('/', [AdminController::class, 'home']);


route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/create_room', [AdminController::class, 'create_room']);
route::post('/add_room', [AdminController::class, 'add_room']);
route::get('/view_room', [AdminController::class, 'view_room']);
route::get('/delete_room/{room_id}', [AdminController::class, 'delete_room']);
route::get('/update_room/{room_id}', [AdminController::class, 'update_room']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

route::get('/room_details/{room_id}', [HomeController::class, 'room_details']);
route::post('/add_booking/{room_id}', [HomeController::class, 'add_booking']);

route::get('/bookings', [AdminController::class, 'bookings']);
