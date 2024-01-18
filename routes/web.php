<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
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
});

Route::get('/token', function(){
    return csrf_token();
});

Route::get('/api/classrooms', [ClassroomController::class, 'index']);
Route::post('/api/classrooms', [ClassroomController::class, 'create']);
Route::get('/api/classrooms/{name}', [ClassroomController::class, 'detail']);

Route::post('/api/students', [StudentController::class, 'create']);
Route::get('/api/students', [StudentController::class, 'index']);