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


route::get('/', [AdminController::class, 'home'])->middleware(['auth', 'admin']);


route::get('/home', [AdminController::class, 'index'])->name('home')->middleware(['auth', 'admin']);
route::get('/create_room', [AdminController::class, 'create_room'])->middleware(['auth', 'admin']);
route::post('/add_room', [AdminController::class, 'add_room'])->middleware(['auth', 'admin']);
route::get('/view_room', [AdminController::class, 'view_room'])->middleware(['auth', 'admin']);
route::get('/delete_room/{room_id}', [AdminController::class, 'delete_room'])->middleware(['auth', 'admin']);
route::get('/update_room/{room_id}', [AdminController::class, 'update_room'])->middleware(['auth', 'admin']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware(['auth', 'admin']);

route::get('/room_details/{room_id}', [HomeController::class, 'room_details']);
route::post('/add_booking/{room_id}', [HomeController::class, 'add_booking']);

route::get('/bookings', [AdminController::class, 'bookings'])->middleware(['auth', 'admin']);

route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->middleware(['auth', 'admin']);

route::get('/approve_booking/{id}', [AdminController::class, 'approve_booking'])->middleware(['auth', 'admin']);
route::get('/reject_booking/{id}', [AdminController::class, 'reject_booking'])->middleware(['auth', 'admin']);

route::get('/view_galary', [AdminController::class, 'view_galary'])->middleware(['auth', 'admin']);
route::post('/upload_gallary', [AdminController::class, 'upload_gallary'])->middleware(['auth', 'admin']);
route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary'])->middleware(['auth', 'admin']);

route::post('/contact', [HomeController::class, 'contact']);

route::get('/all_messages', [AdminController::class, 'all_messages'])->middleware(['auth', 'admin']);

route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->middleware(['auth', 'admin']);


route::post('/mail/{id}', [AdminController::class, 'mail'])->middleware(['auth', 'admin']);
route::get('/our_rooms', [HomeController::class, 'our_rooms']);
route::get('/hotel_gallary', [HomeController::class, 'hotel_gallary']);
route::get('/contact_us', [HomeController::class, 'contact_us']);

