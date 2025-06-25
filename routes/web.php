<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
// route::post('/edit_room',[AdminController::class, 'edit_room']);
route::get('/delete_room/{room_id}', [AdminController::class, 'delete_room']);
route::get('/view_room', [AdminController::class, 'view_room']);
