<?php

use App\Http\Controllers\admin\BasedController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\StackController;
use App\Http\Controllers\admin\TypeController;
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

        // begin:: based
        Route::controller(BasedController::class)->prefix('based')->as('based.')->group(function () {
            Route::get('/', 'index')->name('based');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: based

        // begin:: stack
        Route::controller(StackController::class)->prefix('stack')->as('stack.')->group(function () {
            Route::get('/', 'index')->name('stack');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: stack

        // begin:: type
        Route::controller(TypeController::class)->prefix('type')->as('type.')->group(function () {
            Route::get('/', 'index')->name('type');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: type

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
