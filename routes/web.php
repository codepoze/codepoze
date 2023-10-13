<?php

use App\Http\Controllers\admin\BasedController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\PriceController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfilController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\StackController;
use App\Http\Controllers\admin\TestimonyController;
use App\Http\Controllers\admin\TypeController;
use App\Http\Controllers\admin\VisitorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\pages\AboutController;
use App\Http\Controllers\pages\ContactsController;
use App\Http\Controllers\pages\HomeController;
use App\Http\Controllers\pages\ProductsController;
use App\Http\Controllers\pages\SopController;
use App\Http\Controllers\pages\TestimoniesController;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', function () {
    session()->put('locale', request()->segment(2));
    return redirect()->back();
})->name('lang');

Route::group(
    ['domain' => 'admin.' . env('APP_URL')],
    function () {
        Route::get('/', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/check', [AuthController::class, 'check'])->name('auth.check');
        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

        Route::group(['middleware' => ['session.auth', 'prevent.back.history']], function () {
            Route::controller(DashboardController::class)->prefix('dashboard')->as('dashboard.')->group(function () {
                Route::get('/', [DashboardController::class, 'index'])->name('index');
                Route::get('/count_visitors', [DashboardController::class, 'count_visitors'])->name('count_visitors');
                Route::get('/count_visitors_loc', [DashboardController::class, 'count_visitors_loc'])->name('count_visitors_loc');
            });

            // begin:: profil
            Route::controller(ProfilController::class)->prefix('profil')->as('profil.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/save_picture', 'save_picture')->name('save_picture');
                Route::post('/save_account', 'save_account')->name('save_account');
                Route::post('/save_security', 'save_security')->name('save_security');
            });
            // end:: profil

            // begin:: based
            Route::controller(BasedController::class)->prefix('based')->as('based.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_all', 'get_all')->name('get_all');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/show', 'show')->name('show');
                Route::post('/save', 'save')->name('save');
                Route::post('/del', 'del')->name('del');
            });
            // end:: based

            // begin:: stack
            Route::controller(StackController::class)->prefix('stack')->as('stack.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_all', 'get_all')->name('get_all');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/show', 'show')->name('show');
                Route::post('/save', 'save')->name('save');
                Route::post('/del', 'del')->name('del');
            });
            // end:: stack

            // begin:: type
            Route::controller(TypeController::class)->prefix('type')->as('type.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_all', 'get_all')->name('get_all');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/show', 'show')->name('show');
                Route::post('/save', 'save')->name('save');
                Route::post('/del', 'del')->name('del');
            });
            // end:: type

            // begin:: price
            Route::controller(PriceController::class)->prefix('price')->as('price.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_all', 'get_all')->name('get_all');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/show', 'show')->name('show');
                Route::post('/save', 'save')->name('save');
                Route::post('/del', 'del')->name('del');
            });
            // end:: price

            // begin:: social_media
            Route::controller(SocialMediaController::class)->prefix('social_media')->as('social_media.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_all', 'get_all')->name('get_all');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/show', 'show')->name('show');
                Route::post('/save', 'save')->name('save');
                Route::post('/del', 'del')->name('del');
            });
            // end:: social_media

            // begin:: product
            Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
                Route::get('/', 'index')->name('index');
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
                Route::get('/', 'index')->name('index');
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
                Route::get('/', 'index')->name('index');
                Route::get('/det/{id}', 'det')->name('det');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/del', 'del')->name('del');
            });
            // end:: contact

            // begin:: testimony
            Route::controller(TestimonyController::class)->prefix('testimony')->as('testimony.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/det/{id}', 'det')->name('det');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
                Route::post('/posting', 'posting')->name('posting');
                Route::post('/del', 'del')->name('del');
            });
            // end:: testimony

            // begin:: visitor
            Route::controller(VisitorController::class)->prefix('visitor')->as('visitor.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/get_data_dt', 'get_data_dt')->name('get_data_dt');
            });
            // end:: visitor

            // begin:: notification
            Route::controller(NotificationController::class)->prefix('notification')->as('notification.')->group(function () {
                Route::get('/{status}', 'index')->name('index');
                Route::post('/load', 'load')->name('load');
                Route::post('/read', 'read')->name('read');
                Route::post('/read_all', 'read_all')->name('read_all');
                Route::post('/delete_all', 'delete_all')->name('delete_all');
            });
            // end:: notification
        });
    }
);

Route::group(['middleware' => ['guest', 'set.locale']], function () {
    // begin:: no auth
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/visitor', [HomeController::class, 'visitor'])->name('visitor');
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
});
