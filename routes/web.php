<?php

use App\Http\Controllers\admin\BasedController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PriceController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\StackController;
use App\Http\Controllers\admin\TestimonyController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pages\AboutController;
use App\Http\Controllers\pages\ContactsController;
use App\Http\Controllers\pages\HomeController;
use App\Http\Controllers\pages\ProductsController;
use App\Http\Controllers\pages\SopController;
use App\Http\Controllers\pages\TestimoniesController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function () {
    // begin:: no auth
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/sop', [SopController::class, 'index'])->name('sop');
    Route::controller(ContactsController::class)->prefix('contact')->group(function () {
        Route::get('/', 'index')->name('contact');
        Route::post('/save', 'save')->name('contact.save');
    });
    Route::controller(TestimoniesController::class)->prefix('testimonies')->group(function () {
        Route::get('/', 'index')->name('testimonies');
        Route::post('/save', 'save')->name('testimonies.save');
    });
    Route::controller(ProductsController::class)->prefix('products')->group(function () {
        Route::get('/', 'index')->name('products');
        Route::get('/{slug}', 'type')->name('products.type');
        Route::get('/{slug}/detail/{id}', 'detail')->name('products.detail');
    });
    // end:: no auth

    // begin:: auth
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
    // end:: auth
});
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['session.auth', 'prevent.back.history']], function () {
    // begin:: admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // begin:: profil
        Route::controller(ProfilController::class)->prefix('profil')->as('profil.')->group(function () {
            Route::get('/', 'index')->name('profil');
            Route::post('/save_picture', 'save_picture')->name('save_picture');
            Route::post('/save_account', 'save_account')->name('save_account');
            Route::post('/save_security', 'save_security')->name('save_security');
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

        // begin:: price
        Route::controller(PriceController::class)->prefix('price')->as('price.')->group(function () {
            Route::get('/', 'index')->name('price');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: price

        // begin:: social_media
        Route::controller(SocialMediaController::class)->prefix('social_media')->as('social_media.')->group(function () {
            Route::get('/', 'index')->name('social_media');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: social_media

        // begin:: testimony
        Route::controller(TestimonyController::class)->prefix('testimony')->as('testimony.')->group(function () {
            Route::get('/', 'index')->name('testimony');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/posting', 'posting')->name('posting');
            Route::post('/del', 'del')->name('del');
        });
        // end:: testimony

        // begin:: product
        Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
            Route::get('/', 'index')->name('product');
            Route::get('/add', 'add')->name('add');
            Route::get('/upd/{id}', 'upd')->name('upd');
            Route::get('/det/{id}', 'det')->name('det');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::get('/get_stack_detail/{id}', 'get_stack_detail')->name('get_stack_detail');
            Route::get('/get_picture_detail/{id}', 'get_picture_detail')->name('get_picture_detail');
            Route::post('/del_picture_detail', 'del_picture_detail')->name('del_picture_detail');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: product

        // begin:: project
        Route::controller(ProjectController::class)->prefix('project')->as('project.')->group(function () {
            Route::get('/', 'index')->name('project');
            Route::get('/add', 'add')->name('add');
            Route::get('/upd/{id}', 'upd')->name('upd');
            Route::get('/det/{id}', 'det')->name('det');
            Route::get('/get_all', 'get_all')->name('get_all');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::get('/get_stack_detail/{id}', 'get_stack_detail')->name('get_stack_detail');
            Route::get('/get_picture_detail/{id}', 'get_picture_detail')->name('get_picture_detail');
            Route::post('/del_picture_detail', 'del_picture_detail')->name('del_picture_detail');
            Route::post('/show', 'show')->name('show');
            Route::post('/save', 'save')->name('save');
            Route::post('/del', 'del')->name('del');
        });
        // end:: project

        // begin:: contact
        Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function () {
            Route::get('/', 'index')->name('contact');
            Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            Route::post('/del', 'del')->name('del');
        });
        // end:: contact
    });
    // end:: admin
});
