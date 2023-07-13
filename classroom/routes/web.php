<?php

use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\TopicsController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::post('/classrooms/store', [ClassroomsController::class, 'store'])->name('classroom-store');


// Route::resource('classrooms', ClassroomsController::class);
Route::get('/classrooms' , [ClassroomsController::class ,'index'])->name('classrooms.index');
Route::get('/classrooms/create' , [ClassroomsController::class ,'create'])->name('classrooms.create');
Route::post('/classrooms/store', [ClassroomsController::class, 'store'])->name('classrooms.store');
Route::get('/classrooms/{id}' , [ClassroomsController::class ,'show'])->name('classrooms.show')->where(['id' => '\d+']);
Route::get('/classrooms/{id}/edit' , [ClassroomsController::class ,'edit'])->name('classrooms.edit')->where(['id' => '\d+']);
Route::put('/classrooms/{id}' , [ClassroomsController::class ,'update'])->name('classrooms.update')->where(['id' => '\d+']);
Route::delete('/classrooms/{id}' , [ClassroomsController::class ,'destroy'])->name('classrooms.destroy')->where(['id' => '\d+']);



// topics
Route::get('/topics' , [TopicsController::class ,'index'])->name('topics.index');
Route::get('/topics/{classroom}/create' , [TopicsController::class ,'create'])->name('topics.create');
Route::post('/topics' , [TopicsController::class , 'store'])->name('topics.store');
Route::get('/topics/{id}' , [TopicsController::class ,'show'])->name('topics.show')->where(['id' => '\d+']);
Route::get('/topics/{id}/edit' , [TopicsController::class ,'edit'])->name('topics.edit')->where(['id' => '\d+']);
Route::put('/topics/{id}' , [TopicsController::class ,'update'])->name('topics.update')->where(['id' => '\d+']);
Route::delete('/topics/{id}' , [TopicsController::class ,'destroy'])->name('topics.destroy')->where(['id' => '\d+']);
