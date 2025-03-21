<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStatusController;
use App\Http\Controllers\RoomMemberController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EducationNewController;

use App\Http\Controllers\FileController;


Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/profile/dashboard', function () {
    return Inertia::render('profile/dashboard');
})->name('profile.dashboard');




// Test File Image Upload SQL
Route::get('/file-upload', [FileController::class, 'index'])->name('file.upload');
Route::post('/file-upload-store', [FileController::class, 'store'])->name('file.upload.store');

Route::get('/getProfileImage', [FileController::class, 'getProfileImage'])->name('get.profile.image');





require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
