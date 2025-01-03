<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('auth/login');
});

Route::post('/login', [Controller::class, 'login'])->name('login');
Route::post('/logout', [Controller::class, 'logout'])->name('logout');


Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard');
});

Route::get('createqr', function () {
    return view('createqr');
});

Route::get('siswa', function () {
    return view('siswa');
});

Route::post('/save_kelas', [ClassController::class, 'save']);
Route::get('/fetch_kelas', [ClassController::class, 'fetchKelas']);
Route::post('/update_kelas', [ClassController::class, 'update']);

require __DIR__.'/auth.php';
