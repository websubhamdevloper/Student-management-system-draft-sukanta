<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;

Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');
Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AdminController::class, 'register'])->name('register.post');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('students')->name('students.')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/add', [StudentController::class, 'create'])->name('create');
    Route::post('/add', [StudentController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('/{id}/edit', [StudentController::class, 'update'])->name('update');
});

Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CoursesController::class, 'index'])->name('index');
    Route::get('/add', [CoursesController::class, 'create'])->name('create');
    Route::post('/add', [CoursesController::class, 'store'])->name('store');
});
