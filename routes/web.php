<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaveController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\LoggingNotConfiguredException;
use App\Http\Controllers\LoginController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/promo', [HomeController::class, 'promo']);
Route::get('/testimonial', [HomeController::class, 'testimonial']);
Route::get('/reservation', [HomeController::class, 'reservation']);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [LoginController::class, 'prosesLogin']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/editmenu/{id}', [EditController::class, 'editmenu']);
Route::get('/editpromo/{id}', [EditController::class, 'editpromo']);

Route::get('/addpromo', [AddController::class, 'addpromo']);
Route::get('/addmenu', [AddController::class, 'addmenu']);
Route::get('/addtestimonial', [AddController::class, 'addtestimonial']);
Route::get('/addreservation', [AddController::class, 'addreservation']);

Route::post('/savemenu', [SaveController::class, 'savemenu']);
Route::post('/savepromo', [SaveController::class, 'savepromo']);
Route::post('/savetestimonial', [SaveController::class, 'savetestimonial']);
Route::post('/savereservation', [SaveController::class, 'savereservation']);
Route::post('/saveeditedmenu', [SaveController::class, 'saveeditedmenu']);
Route::post('/saveeditedpromo', [SaveController::class, 'saveeditedpromo']);

Route::post('/deletemenu', [DeleteController::class, 'deletemenu']);
Route::post('/deletepromo', [DeleteController::class, 'deletepromo']);
Route::post('/deletetestimonial', [DeleteController::class, 'deletetestimonial']);
Route::post('/deletereservation', [DeleteController::class, 'deletereservation']);

Route::post('/approvetestimonial', [ApproveController::class, 'approvetestimonial']);
Route::post('/approvereservation', [ApproveController::class, 'approvereservation']);
