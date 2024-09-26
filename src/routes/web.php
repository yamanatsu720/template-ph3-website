<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('/admin', function () {
    //     return view('admin.dashboard'); // 空のダッシュボードのビュー
    // });
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [UserController::class, 'index'])->name('users');

});

Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes');


Route::get('/quizzes/{id}', [QuizController::class, 'show'])->name('quizzes.show');

Route::get('/answer/{choiceId}', [QuizController::class, 'getIsCorrect'])->name('choice.getIsCorrect');

Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');

Route::patch('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');

Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('quizzes.destroy');


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::prefix('admin')->group(function () {
//         // Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//         Route::get('/quizzes', [AdminQuizController::class, 'index'])->name('admin.dashboard');
//         Route::resource('quizzes', AdminQuizController::class);
//         Route::get('/quizzes/{id}', [AdminQuizController::class, 'show'])->name('admin.quiz.show');
//         // 他の管理用ルートもここに追加
//     });
// });

require __DIR__.'/auth.php';
