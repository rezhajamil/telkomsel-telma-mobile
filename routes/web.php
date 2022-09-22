<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SalesController;
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

Route::middleware(['auth'])->group(
    function () {
        Route::resource('/', HomeController::class);
        Route::resource('/absen', AbsenController::class);
        Route::resource('/challenge', ChallengeController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/poin', PoinController::class);
        Route::resource('/quiz', QuizController::class);
        Route::resource('/sales', SalesController::class);
        Route::get('/start/quiz', [QuizController::class, 'start']);
        Route::post('/store_answer/quiz/', [QuizController::class, 'store_answer'])->name('quiz.answer.store');
        Route::get('/profile', [ProfileController::class, 'index']);

        Route::post('/get_challenge', [ChallengeController::class, 'get_challenge']);
        Route::post('/get_paket', [SalesController::class, 'get_paket']);
    }
);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
