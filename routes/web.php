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
use App\Http\Controllers\PaymentController;

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

    Route::get('/account/{Page}', [
        AccountController::class, 'index'
    ])->name('user.account');
    
    Route::post('/cart/add-item', [
        CartsController::class, 'add_to_cart'
    ])->name('user.cart.add-item');

    Route::post('/cart/remove-item', [
        CartsController::class, 'remove_from_cart'
    ])->name('user.cart.remove.item');

    Route::get('/cart/clear-cart', [
        CartsController::class, 'clear_cart'
    ])->name('user.cart.clear.items');

    Route::get('/cart', [
        CartsController::class, 'cart'
    ])->name('user.cart');

    Route::get('/makeorder', [
        AccountController::class, 'make_order'
    ])->name('user.make-order');

    Route::get('/download/{id}', [
        AccountController::class, 'download'
    ])->name('user.package-download');
});

Route::group(['prefix'=>'admin'],function(){

    Route::get('/',  function () {
        return redirect('admin/analytics');
    })->middleware('admin');

    // Analytics
    Route::get('/login', [
        LoginController::class, 'admin_login_form'
    ])->name('admin.login');

    Route::post('/login', [
        LoginController::class, 'admin_login'
    ])->name('admin.login');

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

        
        Route::get('page-new', [
            CmsController::class, 'new_page'
        ])->name('admin.cms.page-new');

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

        // MOCKUP
        Route::get('mockups-list',[
            MockupsController::class, 'index'
        ])->name('admin.products.mockups.list');

        Route::get('mockups-new',[
            MockupsController::class, 'new'
        ])->name('admin.products.mockups.new');

        Route::get('mockups-edit/{id}',[
            MockupsController::class, 'new'
        ])->name('admin.products.mockups.edit');

        Route::post('mockups-new',[
            MockupsController::class, 'save'
        ])->name('admin.products.mockups.new');

        Route::post('mockups-new/{id}',[
            MockupsController::class, 'save'
        ])->name('admin.products.mockups.new');

        Route::get('mockup-presentation/{id}',[
            MockupsController::class, 'presentation'
        ])->name('admin.products.mockups.presentation');

        Route::post('presentation-image-upload',[
            MockupsController::class, 'save_presentation_img'
        ])->name('admin.products.mockups.presentation-save');

        Route::get('mockups-delete/{id}',[
            MockupsController::class, 'delete'
        ])->name('admin.products.mockups-delete');

        Route::get('mockups-trash',[
            MockupsController::class, 'trash'
        ])->name('admin.products.mockups.trash');

        Route::get('mockups-restore/{id}',[
            MockupsController::class, 'restore'
        ])->name('admin.products.mockup-restore');
        
        Route::post('mockups-group-new',[
            MockupsController::class, 'new_group'
        ])->name('admin.cms.mockups-group');

        Route::post('mockups-new-extension',[
            MockupsController::class, 'new_extension'
        ])->name('admin.cms.mockups-extension');
        

        // SHOWCASE
        Route::get('showcase-list',[
            ShowcaseController::class, 'index'
        ])->name("admin.products.showcases");

        Route::post('showcase-list',[
            ShowcaseController::class, 'add'
        ])->name("admin.products.showcases");

        Route::get('showcase-list/{id}',[
            ShowcaseController::class, 'delete'
        ])->name("admin.showcase-delete");

        Route::get('showcase-trash',[
            ShowcaseController::class, 'trash'
        ])->name('admin.cms.showcase-trash');

        Route::get('showcase-trash/{id}', [
            ShowcaseController::class, 'restore'
        ])->name('admin.cms.showcase-restore');
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

Route::get('/logout',[
    LoginController::class, 'logout'
]);

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');

// Payments

// Razorpay
Route::post('payment',[
    PaymentController::class, 'payment'
])->name('payment');

Route::get('payment-razorpay',[
    PaymentController::class, 'create'
])->name('paywithrazorpay');

// Paypal
Route::get('paypal',[
    PaymentController::class, 'index'
])->name('paypal');

// route for processing payment
Route::post('paypal', [
    PaymentController::class, 'payWithpaypal'
])->name('paypal');

// route for check status of the payment
Route::get('status',[
    PaymentController::class, 'getPaymentStatus'
])->name('status');