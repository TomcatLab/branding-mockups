<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\EmailsController;
use App\Http\Controllers\Admin\MockupsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ShowcaseController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\AccountController;
use App\Http\Controllers\Users\CartsController;
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

Route::group(['prefix'=>'user'], function () {
    Route::get('/account', [
        AccountController::class, 'index'
    ]);
    Route::get('/cart', [
        CartsController::class, 'cart'
    ]);
    Route::post('/cart/add-item', [
        CartsController::class, 'add_to_cart'
    ])->name('user.cart.add-item');
    Route::post('/cart/remove-item', [
        CartsController::class, 'remove_from_cart'
    ])->name('user.cart.remove.item');

});

Route::group(['prefix'=>'admin'],function(){

    // Analytics
    Route::get('/login', [
        LoginController::class, 'admin_login_form'
    ])->name('admin.login');

    Route::post('/login', [
        LoginController::class, 'admin_login'
    ])->name('admin.login');

    Route::get('/', [
        AnalyticsController::class, 'index'
    ]);

    Route::get('analytics', [
        AnalyticsController::class, 'index'
    ])->name('admin.analytics');

    Route::group(['prefix'=>'cms'],function(){
       
        Route::get('pages-list',[
            CmsController::class, 'index'
        ])->name('admin.cms.page-list');

        Route::get('page-edit/{id}', [
            CmsController::class, 'page'
        ])->name('admin.cms.page-edit');

        Route::post('page-edit/{id}', [
            CmsController::class, 'ajax_save'
        ])->name('admin.cms.page-edit');

        Route::get('page-publish/{id}', [
            CmsController::class, 'publish'
        ])->name('admin.cms.page-publish');

        Route::post('page-add', [
            CmsController::class, 'add'
        ])->name('admin.cms.page-add');

        Route::get('pages-trash',[
            CmsController::class, 'trash'
        ]);

        Route::post('page-group',[
            CmsController::class, 'new_group'
        ])->name('admin.cms.page-group');

        Route::get('slider-list',[
            SlidesController::class, 'index'
        ])->name('admin.cms.slide-list');

        Route::post('slider-list',[
            SlidesController::class, 'add'
        ])->name('admin.cms.slide-list');

        Route::post('slider-add-image',[
            SlidesController::class, 'add_image'
        ])->name('admin.cms.slide-add-image');

        Route::get('banner-list',[
            BannersController::class, 'index'
        ])->name('admin.cms.banner-list');

        Route::post('banner-list',[
            BannersController::class, 'add'
        ])->name('admin.cms.banner-list');

        Route::post('banner-add-image',[
            BannersController::class, 'add_image'
        ])->name('admin.cms.banner-add-image');
    });

    Route::group(['prefix'=>'emails'],function(){
        Route::get('/',[
            EmailsController::class, 'index'
        ])->name('admin.emails');
        Route::post('/',[
            EmailsController::class, 'Save'
        ])->name('admin.emails');
    });

    Route::group(['prefix'=>'products'],function(){
        
        Route::get('mockups-list',[
            MockupsController::class, 'index'
        ])->name('admin.products.mockups.list');

        Route::get('mockups-new',[
            MockupsController::class, 'new'
        ])->name('admin.products.mockups.new');

        Route::post('mockups-new',[
            MockupsController::class, 'save'
        ])->name('admin.products.mockups.new');

        Route::delete('mockups-list',[
            MockupsController::class, 'delete'
        ])->name('admin.products.mockups.list');

        Route::get('mockups-trash',[
            MockupsController::class, 'trash'
        ])->name('admin.products.mockups.trash');

        Route::post('mockups-group-new',[
            MockupsController::class, 'new_group'
        ])->name('admin.cms.mockups-group');

        Route::post('mockups-new-extension',[
            MockupsController::class, 'new_extension'
        ])->name('admin.cms.mockups-extension');

        Route::get('showcase-list',[
            ShowcaseController::class, 'index'
        ])->name("admin.products.showcases");

        Route::post('showcase-list',[
            ShowcaseController::class, 'add'
        ])->name("admin.products.showcases");

        Route::delete('showcase-list',[
            ShowcaseController::class, 'delete'
        ])->name("admin.products.showcases");

        Route::get('showcase-trash',[
            ShowcaseController::class, 'trash'
        ]);
    });
    
    Route::get('settings',[
        SettingsController::class, 'index'
    ])->name('admin.settings');

    Route::post('settings',[
        SettingsController::class, 'save'
    ])->name('admin.settings');

    Route::group(['prefix'=>'users'],function(){
        Route::get('users-list',[
            UsersController::class, 'index'
        ]);
        Route::get('users-trash',[
            UsersController::class, 'trash'
        ]);    
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');