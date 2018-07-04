<?php

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

Route::get('/', 'HomeController@index')->name('index');
Route::get('oldlogin', function () {

    return view('auth.login2');
});

Route::get("/dashboard/orders",'DashboardController@order');

///rating route
Route::post('reveiw/{id}', 'HomeController@storeReviewForProduct');

Route::get('logout', 'HomeController@logout');

Route::get('about', 'HomeController@about')->name('about');
Route::get('news', 'HomeController@blog')->name('blog');
Route::get('/bakery','HomeController@bakery')->name('bakery');

Route::get('rest', function () {

    $result='{"responsecode":"00","responsemessage":"Vending Successful","vendinfo":"----------------------------|Type: STS PrePaid|Terminal ID: UBA001|Receipt #: 125656|Cust. Name: UCHENNA NNADI .|Tariff Index: 01|Tariff: Commercial C1|Address: Erf# NON CAPMI,| "BERGER L||Credit Token|Meter #: 45031790699|SGC: 600341|||VAT|Amt Paid: N138.1||Fix Charge|Amt Paid: N0|Cost of Elect. (Excl): N2761.9||Units Breakdown|73.9 kWh at 37.39|||Credit Token: |4201-5020-7909-2391-5231||*****************************|THIS RECEIPT PRINTOUT IS FREE|*****************************|----------------------------|"}';

    $new_result = str_replace('| "', '|', $result);

    $obj = json_decode($new_result);

    return $obj->vendinfo;
});


Route::get('blog/{slug}', 'HomeController@blogDetails')->name('blog.details');

Route::get('category/{category}', 'HomeController@singleCategory')->name('product.category');
Route::get('product/{slug}', 'HomeController@singleProduct')->name('product.single');

Route::get('cart', 'CartController@cart')->name('cart');
Route::get('cart/add/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('cart/delete/{id}', 'CartController@cartDelete')->name('cart.delete');

Route::get('search', 'HomeController@search')->name('search');

Route::get('cms', 'ProductController@adminIndex')->name('cms.index');

Route::resource('cms/product', 'ProductController', ['except' => [

    'delete'
]]);

Route::resource('cms/blog', 'BlogController', ['except' => [
    'delete'
]]);

Route::get('cms/product/delete/{id}', 'ProductController@destroy')->name('product.delete');

Route::get('cms/orders', 'OrderController@allOrders')->name('all.orders');
Route::get('cms/orders/details/{id}', 'OrderController@orderDetails')->name('order.details');
Route::get('cms/pending-orders', 'OrderController@pendingOrders')->name('pending.orders');
Route::get('cms/delivered-orders', 'OrderController@deliveredOrders')->name('delivered.orders');
Route::get('cms/prescriptions', 'ProductController@allPrescription')->name('prescription.all');

Route::get('cms/sub_categories/{category_id}', 'ProductController@getSubcategory')->name('subcategory');
Route::post('cms/process-order/{id}', 'OrderController@processOrder')->name('process.order');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard/wallet', 'DashboardController@wallet')->name('dashboard.wallet');
    Route::get('dashboard/profile', 'DashboardController@showProfile')->name('profile');
    Route::get('dashboard/order-details/{id}', 'DashboardController@orderDetails')->name('user.orderDetails');
    Route::resource('dashboard/prescription', 'PrescriptionController');

    Route::get('checkout', 'CartController@checkout')->name('checkout');


    Route::post('pay-with-wallet', 'PaymentController@payWithWallet')->name('checkout.wallet');
    Route::post('pay-on-pickup', 'PaymentController@payOnPickup')->name('pay.onPickup');

    Route::get('card-payment-callback', 'PaymentController@paymentCallBack')->name('payment.callback');
    Route::post('pay', 'PaymentController@redirectToGateway')->name('pay');

    Route::post('complete-profile', 'DashboardController@updateProfile')->name('profile.update');
    Route::post('change-password', 'DashboardController@changePassword')->name('change.password');

});

//admin route for our multi-auth system

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'Auth\AdminLoginController@loginAdmin')->name('admin.login.submit');
});


