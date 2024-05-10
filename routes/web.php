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


Route::post('/login', [LoginController::class, 'login'])->name('login'); // done
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // done

Route::middleware('auth')->group(function () {

Route::get('/reimbursements', [ReimbursementsController::class, 'index'])->name('reimbursement.index'); // done
Route::get('/reimbursements/create', [ReimbursementsController::class, 'create'])->name('reimbursement.create');
Route::post('/reimbursements/store', [ReimbursementsController::class, 'store'])->name('reimbursement.store'); // done
Route::post('/reimbursements', [ReimbursementsController::class, 'edit'])->name('reimbursement.edit');
Route::delete('/reimbursements/{id}', [UserController::class, 'destroy'])->name('reimbursement.destroy'); // done


Route::get('/reimbursement/{id}', [ReimbursementsController::class, 'detail'])->name('reimbursement.detail'); // done
Route::get('/reimbursement/approved/{id}', [ReimbursementsController::class, 'approved'])->name('reimbursement.approved'); // done
Route::get('/reimbursement/rejected/{id}', [ReimbursementsController::class, 'rejected'])->name('reimbursement.rejected'); // done
Route::get('/reimbursement/paid/{id}', [ReimbursementsController::class, 'paid'])->name('reimbursement.paid'); // done

Route::get('/users', [UserController::class, 'index'])->name('user.index'); // done
Route::post('/users/create', [UserController::class, 'create'])->name('user.create'); // done
route::get('/users/store', [UserController::class, 'store'])->name('user.store'); // done
Route::post('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit'); // done
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // done



Route::get('/home', [HomeController::class, 'index'])->name('home.index'); // done


});