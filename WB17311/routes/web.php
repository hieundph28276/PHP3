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

Route::match(['GET', 'POST'], '/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
//tất cả những route nào cần được check đăng nhập mới vào được thì vứt vào trong này
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('route_student_index');
    Route::match(['GET', 'POST'], '/student/add', [App\Http\Controllers\StudentController::class, 'add'])->name('route_student_add');
    Route::match(['GET', 'POST'], '/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('route_student_edit');
    Route::get('/student/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete'])->name('route_student_delete');
});
//->middleware('check.role') cần check cái gì
// Route::get('/students', [\APi\Http\Controller\])
Route::get('/students', [App\Http\Controllers\StudentController::class, 'index'])->name('route_student_index');
