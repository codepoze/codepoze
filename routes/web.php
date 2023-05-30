<?php

use App\Http\Controllers\admin\BasedController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\StackController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// begin:: auth
Route::get('/', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
// end:: auth

Route::group(['middleware' => ['session.auth', 'prevent.back.history']], function () {
    // begin:: admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // begin:: profil
        Route::prefix('/profil')->group(function () {
            Route::get('/', [ProfilController::class, 'index'])->name('profil');
            Route::post('/save_picture', [ProfilController::class, 'save_picture'])->name('profil.save_picture');
            Route::post('/save_account', [ProfilController::class, 'save_account'])->name('profil.save_account');
            Route::post('/save_security', [ProfilController::class, 'save_security'])->name('profil.save_security');
        });
        // end:: profil

        // begin:: stack
        Route::prefix('/stack')->group(function () {
            Route::get('/', [StackController::class, 'index'])->name('stack');
            Route::get('/get_all', [StackController::class, 'get_all'])->name('stack.get_all');
            Route::get('/get_data_dt', [StackController::class, 'get_data_dt'])->name('stack.get_data_dt');
            Route::post('/show', [StackController::class, 'show'])->name('stack.show');
            Route::post('/save', [StackController::class, 'save'])->name('stack.save');
            Route::post('/del', [StackController::class, 'del'])->name('stack.del');
        });
        // end:: stack

        // begin:: based
        Route::prefix('/based')->group(function () {
            Route::get('/', [BasedController::class, 'index'])->name('based');
            Route::get('/get_all', [BasedController::class, 'get_all'])->name('based.get_all');
            Route::get('/get_data_dt', [BasedController::class, 'get_data_dt'])->name('based.get_data_dt');
            Route::post('/show', [BasedController::class, 'show'])->name('based.show');
            Route::post('/save', [BasedController::class, 'save'])->name('based.save');
            Route::post('/del', [BasedController::class, 'del'])->name('based.del');
        });
        // end:: based

        // begin:: project
        Route::prefix('/project')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('project');
            Route::get('/add', [ProjectController::class, 'add'])->name('project.add');
            Route::get('/upd/{id}', [ProjectController::class, 'upd'])->name('project.upd');
            Route::get('/det/{id}', [ProjectController::class, 'det'])->name('project.det');
            Route::get('/get_data_dt', [ProjectController::class, 'get_data_dt'])->name('project.get_data_dt');
            Route::get('/get_stack_detail/{id}', [ProjectController::class, 'get_stack_detail'])->name('project.get_stack_detail');
            Route::get('/get_picture_detail/{id}', [ProjectController::class, 'get_picture_detail'])->name('project.get_picture_detail');
            Route::post('/del_picture_detail', [ProjectController::class, 'del_picture_detail'])->name('project.del_picture_detail');
            Route::post('/save', [ProjectController::class, 'save'])->name('project.save');
            Route::post('/del', [ProjectController::class, 'del'])->name('project.del');
        });
        // end:: project
    });
    // end:: admin
});
