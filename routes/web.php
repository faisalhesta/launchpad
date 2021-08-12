<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/teachers/list',[App\Http\Controllers\TeachersController::class,'list'])->name('teachers.list');
Route::get('/teachers/approve/{id}',[App\Http\Controllers\TeachersController::class,'approve'])->name('teacher.approve');

Route::get('/students/list',[App\Http\Controllers\StudentsController::class,'list'])->name('students.list');
Route::get('/students/assign-teacher/{id}',[App\Http\Controllers\StudentsController::class,'assign_form'])->name('students.assign');
Route::post('/students/assign-teacher/{id}',[App\Http\Controllers\StudentsController::class,'assign_teacher'])->name('assign.teacher.post');


Route::post('/teacher/update-profile',[App\Http\Controllers\TeachersController::class,'update_profile'])->name('teachers.update.profile');
Route::post('/student/update-profile',[App\Http\Controllers\StudentsController::class,'update_profile'])->name('students.update.profile');
