<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;

// Questions

Route::get('/', [QuestionController::class, 'index']);

Route::get('/exams', [ExamController::class, 'index'])->name('exams');

Route::middleware('professor')->group(function() {

    Route::get('/questions', [QuestionController::class, 'list'])->name('questions');
    Route::get('/questions/create', [QuestionController::class,'create'])->name('questions.create');
    Route::post('/questions/store', [QuestionController::class,'store'])->name('questions.store');
    Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
    Route::get('/questions/edit/{id}', [QuestionController::class,'edit'])->name('questions.edit');
    Route::put('/questions/update/{id}', [QuestionController::class,'update'])->name('questions.update');
    Route::delete('/questions/delete/{id}', [QuestionController::class,'destroy'])->name('questions.destroy');
    
    Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams/store', [ExamController::class, 'store'])->name('exams.store');
    Route::delete('/exams/delete/{id}', [ExamController::class, 'destroy'])->name('exams.delete');  

});

Route::get('/exams/{id}', [ExamController::class, 'show'])->name('exams.show');
Route::get('/exams/execute/{id}', [ExamController::class, 'execute'])->name('exams.execute')->middleware('student');

// Authentication

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register')->middleware('admin');
Route::post('/store', [RegisterController::class, 'store'])->name('auth.store')->middleware('admin');
Route::put('/update/{id}', [RegisterController::class, 'update'])->name('password.update');
Route::get('/changepassword', [RegisterController::class, 'change_password']);

// Classes

Route::get('/classes', [ClassroomController::class, 'index'])->name('classes.index');
Route::get('/classes/create', [ClassroomController::class, 'create'])->name('classes.create');
Route::post('/classes/store', [ClassroomController::class, 'store'])->name('classes.store');
Route::get('/classes/{id}', [ClassroomController::class, 'show'])->name('classes.show');