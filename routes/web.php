<?php

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

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [QuestionController::class, 'index']);

Route::get('/questions', [QuestionController::class, 'list']); 

Route::middleware('professor')->group(function() {

    Route::get('/questions/create', [QuestionController::class,'create'])->name('questions.create');
    Route::post('/questions/store', [QuestionController::class,'store'])->name('questions.store');
    Route::get('/questions/edit/{id}', [QuestionController::class,'edit'])->name('questions.edit');
    Route::put('/questions/update/{id}', [QuestionController::class,'update'])->name('questions.update');
    Route::delete('/questions/delete/{id}', [QuestionController::class,'destroy']);

});

Route::get('/questions/{id}', [QuestionController::class, 'show']);

// Authentication

Route::get('/login', [LoginController::class, 'index']);

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('admin');

Route::post('/store', [RegisterController::class, 'store'])->name('store')->middleware('admin');

Route::put('/update/{id}', [RegisterController::class, 'update']);

Route::get('/changepassword', [RegisterController::class, 'change_password']);

// Exam

Route::get('/exams', [ExamController::class, 'index'])->name('exams');

Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');

Route::post('/exams/store', [ExamController::class, 'store'])->name('exams.store');