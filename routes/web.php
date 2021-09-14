<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admins\{
    EducationController,
    DashboardController,
    ExperienceController,
    UserController
};
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'index'])->name('auth');
Route::post('login/auth', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'web'])->prefix('sys-admin')->group(function(){

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Education Menu
        Route::resource('education', EducationController::class);
        // Experiance Menu
        Route::resource('experience', ExperienceController::class);
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // user
        Route::get('user', [UserController::class, 'index'])->name('users.index');
        Route::put('user/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::patch('user/changepassword', [UserController::class, 'updatepassword'])->name('users.updatepassword');

});
