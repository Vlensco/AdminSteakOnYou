<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/menu', [HomeController::class, 'menu']);
Route::get('/promo', [HomeController::class, 'promo']);
Route::get('/testimonial', [HomeController::class, 'testimonial']);
Route::get('/reservation', [HomeController::class, 'reservation']);
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'prosesLogin']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/editmenu/{id}', [HomeController::class, 'editmenu']);
Route::get('/editpromo/{id}', [HomeController::class, 'editpromo']);

Route::get('/addpromo', [HomeController::class, 'addpromo']);
Route::get('/addmenu', [HomeController::class, 'addmenu']);
Route::get('/addtestimonial', [HomeController::class, 'addtestimonial']);
Route::get('/addreservation', [HomeController::class, 'addreservation']);

Route::post('/savemenu', [HomeController::class, 'savemenu']);
Route::post('/savepromo', [HomeController::class, 'savepromo']);
Route::post('/savetestimonial', [HomeController::class, 'savetestimonial']);
Route::post('/savereservation', [HomeController::class, 'savereservation']);

Route::post('/deletemenu', [HomeController::class, 'deletemenu']);
Route::post('/deletepromo', [HomeController::class, 'deletepromo']);
Route::post('/deletetestimonial', [HomeController::class, 'deletetestimonial']);
Route::post('/deletereservation', [HomeController::class, 'deletereservation']);

Route::post('/approvetestimonial', [HomeController::class, 'approvetestimonial']);
Route::post('/approvereservation', [HomeController::class, 'approvereservation']);

Route::post('/saveeditedmenu', [HomeController::class, 'saveeditedmenu']);
Route::post('/saveeditedpromo', [HomeController::class, 'saveeditedpromo']);