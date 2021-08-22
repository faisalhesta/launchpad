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

Route::get('/teachers/profile',[App\Http\Controllers\TeachersController::class,'profile'])->name('teachers.home');
Route::get('/teachers/register',[App\Http\Controllers\TeachersController::class,'register'])->name('teachers.register');
Route::post('/teachers/register',[App\Http\Controllers\TeachersController::class,'store'])->name('teachers.store');

Route::get('mark-as-read', function () {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');


Route::group(['middleware' => ['admin']],function () {
    Route::get('/teachers/list',[App\Http\Controllers\TeachersController::class,'list'])->name('teachers.list');
    Route::get('/teachers/approve/{id}',[App\Http\Controllers\TeachersController::class,'approve'])->name('teacher.approve');    
    Route::get('/students/list',[App\Http\Controllers\StudentsController::class,'list'])->name('students.list');
    Route::get('/students/assign-teacher/{id}',[App\Http\Controllers\StudentsController::class,'assign_form'])->name('students.assign');
    Route::post('/students/assign-teacher/{id}',[App\Http\Controllers\StudentsController::class,'assign_teacher'])->name('assign.teacher.post');

});
Route::get('/students/profile',[App\Http\Controllers\StudentsController::class,'profile'])->name('students.home');
Route::get('/students/register',[App\Http\Controllers\StudentsController::class,'register'])->name('students.register');
Route::post('/students/register',[App\Http\Controllers\StudentsController::class,'store'])->name('students.store');


Route::post('/teacher/update-profile',[App\Http\Controllers\TeachersController::class,'update_profile'])->name('teachers.update.profile');
Route::post('/student/update-profile',[App\Http\Controllers\StudentsController::class,'update_profile'])->name('students.update.profile');
