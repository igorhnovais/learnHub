<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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


Route::get('/', [CourseController::class, 'index']);

Route::get('/courses/create', [CourseController::class, 'create'])->middleware('auth');
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::post('/courses/join/{id}', [CourseController::class, 'joinEvent'])->middleware('auth');
Route::delete('courses/leave/{id}', [CourseController::class, 'leaveCourse'])->middleware('auth');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->middleware('auth');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->middleware('auth');
Route::put('/courses/update/{id}', [CourseController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [CourseController::class, 'dashboard'])->middleware('auth');




