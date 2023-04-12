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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/questions', [QuestionController::class, 'index']);

Route::get('/questions/create', [QuestionController::class, 'create']);

Route::get('/questions/edit/{id}', [QuestionController::class, 'edit']);

Route::put('/questions/update/{id}', [QuestionController::class, 'update']);

Route::post('/enviar', [QuestionController::class, 'store']);