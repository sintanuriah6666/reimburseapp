<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReimbursementsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth2.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/reimbursements', [ReimbursementsController::class, 'index'])->name('reimbursement.index');
Route::get('/reimbursements/create', [ReimbursementsController::class, 'create'])->name('reimbursement.create');
Route::post('/reimbursements/store', [ReimbursementsController::class, 'store'])->name('reimbursement.store');
Route::post('/reimbursements', [ReimbursementsController::class, 'edit'])->name('reimbursement.edit');
Route::delete('/reimbursements/{reimbursement}', [ReimbursementsController::class, 'destroy'])->name('reimbursement.destroy');
Route::get('/reimbursement/{id}', [ReimbursementsController::class, 'detail'])->name('reimbursement.detail');
Route::get('/reimbursement/approved/{id}', [ReimbursementsController::class, 'approved'])->name('reimbursement.approved');
Route::get('/reimbursement/rejected/{id}', [ReimbursementsController::class, 'rejected'])->name('reimbursement.rejected');
Route::get('/reimbursement/paid/{id}', [ReimbursementsController::class, 'paid'])->name('reimbursement.paid');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users/create', [UserController::class, 'create'])->name('user.create');
route::get('/users/store', [UserController::class, 'store'])->name('user.store');
Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});