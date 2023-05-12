<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Questions

Route::get('/', [QuestionController::class, 'index']);

Route::get('/questions', [QuestionController::class, 'list'])->name('questions');

Route::middleware('professor')->group(function() {

    Route::get('/questions/create', [QuestionController::class,'create'])->name('questions.create');
    Route::post('/questions/store', [QuestionController::class,'store'])->name('questions.store');
    Route::get('/questions/edit/{id}', [QuestionController::class,'edit'])->name('questions.edit');
    Route::put('/questions/update/{id}', [QuestionController::class,'update'])->name('questions.update');
    Route::delete('/questions/delete/{id}', [QuestionController::class,'destroy'])->name('questions.destroy');

});

Route::get('/questions/{id}', [QuestionController::class, 'show']);

// Authentication

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/register', [RegisterController::class, 'index'])->name('auth.register')->middleware('admin');

Route::post('/store', [RegisterController::class, 'store'])->name('auth.store')->middleware('admin');

Route::put('/update/{id}', [RegisterController::class, 'update'])->name('password.update');

Route::get('/changepassword', [RegisterController::class, 'change_password']);

// Exam

Route::get('/exams', [ExamController::class, 'index'])->name('exams');

Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');

Route::post('/exams/store', [ExamController::class, 'store'])->name('exams.store');

Route::get('/exams/{id}', [ExamController::class, 'show'])->name('exams.show');

Route::delete('/exams/delete/{id}', [ExamController::class, 'destroy'])->name('exams.delete');  