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

// Route::group(['prefix'=>''], function () {
//     Route::get('/', [
//         HomeController::class, 'index'
//     ]);
//     Route::get('/{page}', [
//         HomeController::class, 'index'
//     ]);
// });

Route::group(['prefix'=>'admin'],function(){

    // Analytics
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

        Route::get('page-edit', [
            CmsController::class, 'page'
        ])->name('admin.cms.page-edit');

        Route::post('page-add', [
            CmsController::class, 'add'
        ])->name('admin.cms.page-add');

        Route::get('pages-trash',[
            CmsController::class, 'trash'
        ]);
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

        Route::get('showcase-list',[
            ShowcaseController::class, 'index'
        ])->name("admin.products.showcases");

        Route::post('showcase-list',[
            ShowcaseController::class, 'add'
        ])->name("admin.products.showcases");

        Route::get('showcase-trash',[
            ShowcaseController::class, 'index'
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
        Route::get('users-add',[
            CmsController::class, 'add'
        ]);
        Route::get('users-trash',[
            CmsController::class, 'trash'
        ]);    
    });
});