<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\MockupsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShowcaseController;
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

Route::get('/', [
    HomeController::class, 'index'
]);

Route::group(['prefix'=>'home'], function () {
    Route::get('/', [
        HomeController::class, 'index'
    ]);
    Route::get('/{slug}', [
        HomeController::class, 'index'
    ]);
    Route::get('/{slug}/{id}', [
        HomeController::class, 'index'
    ]);
    Route::get('/{slug}/{id}/{sku}', [
        HomeController::class, 'index'
    ]);
});

Route::group(['prefix'=>'admin'],function(){

    // Analytics
    Route::get('/login', [
        App\Http\Controllers\Auth\LoginController::class, 'admin_login_form'
    ])->name('admin.login');

    Route::post('/login', [
        App\Http\Controllers\Auth\LoginController::class, 'admin_login'
    ])->name('admin.login');

    Route::get('/', [
        App\Http\Controllers\Admin\AnalyticsController::class, 'index'
    ]);

    Route::get('analytics', [
        App\Http\Controllers\Admin\AnalyticsController::class, 'index'
    ])->name('admin.analytics');

    Route::group(['prefix'=>'cms'],function(){
       
        Route::get('pages-list',[
            App\Http\Controllers\Admin\CmsController::class, 'index'
        ])->name('admin.cms.page-list');

        Route::get('page-edit/{id}', [
            App\Http\Controllers\Admin\CmsController::class, 'page'
        ])->name('admin.cms.page-edit');

        Route::post('page-add', [
            App\Http\Controllers\Admin\CmsController::class, 'add'
        ])->name('admin.cms.page-add');

        Route::get('pages-trash',[
            App\Http\Controllers\Admin\CmsController::class, 'trash'
        ]);

        Route::post('page-group',[
            App\Http\Controllers\Admin\CmsController::class, 'new_group'
        ])->name('admin.cms.page-group');
    });

    Route::group(['prefix'=>'emails'],function(){
        Route::get('/',[
            App\Http\Controllers\Admin\EmailsController::class, 'index'
        ])->name('admin.emails');
        Route::post('/',[
            App\Http\Controllers\Admin\EmailsController::class, 'Save'
        ])->name('admin.emails');
    });

    Route::group(['prefix'=>'products'],function(){
        
        Route::get('mockups-list',[
            App\Http\Controllers\Admin\MockupsController::class, 'index'
        ])->name('admin.products.mockups.list');

        Route::get('mockups-new',[
            App\Http\Controllers\Admin\MockupsController::class, 'new'
        ])->name('admin.products.mockups.new');

        Route::post('mockups-new',[
            App\Http\Controllers\Admin\MockupsController::class, 'save'
        ])->name('admin.products.mockups.new');

        Route::delete('mockups-list',[
            App\Http\Controllers\Admin\MockupsController::class, 'delete'
        ])->name('admin.products.mockups.list');

        Route::get('mockups-trash',[
            App\Http\Controllers\Admin\MockupsController::class, 'trash'
        ])->name('admin.products.mockups.trash');

        Route::get('showcase-list',[
            App\Http\Controllers\Admin\ShowcaseController::class, 'index'
        ])->name("admin.products.showcases");

        Route::post('showcase-list',[
            App\Http\Controllers\Admin\ShowcaseController::class, 'add'
        ])->name("admin.products.showcases");

        Route::delete('showcase-list',[
            App\Http\Controllers\Admin\ShowcaseController::class, 'delete'
        ])->name("admin.products.showcases");

        Route::get('showcase-trash',[
            App\Http\Controllers\Admin\ShowcaseController::class, 'trash'
        ]);
    });
    
    Route::get('settings',[
        App\Http\Controllers\Admin\SettingsController::class, 'index'
    ])->name('admin.settings');

    Route::post('settings',[
        App\Http\Controllers\Admin\SettingsController::class, 'save'
    ])->name('admin.settings');

    Route::group(['prefix'=>'users'],function(){
        Route::get('users-list',[
            App\Http\Controllers\Admin\UsersController::class, 'index'
        ]);
        Route::get('users-trash',[
            App\Http\Controllers\Admin\UsersController::class, 'trash'
        ]);    
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
