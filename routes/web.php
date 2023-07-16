<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

// Route::get('lang/{local}',function($local){
//     if(!in_array($local,['en','vn'])){
//        abort(404);
//     }
//     Session()->put('local',$local);
//     return redirect()->back();
//     });
Route::group(['prefix' => 'login', 'namespace' => 'Admin'], function () {
   Route::get('login', 'loginController@getdangnhap')->name('login');
   Route::post('postlogin', 'loginController@postdangnhap')->name('postlogin');
   Route::get('singup', 'loginController@getdangky')->name('singup');
   Route::post('postsingup', 'loginController@postdangky')->name('postsingup');
   Route::get('singout', 'loginController@dangxuat')->name('singout');
});


Route::post('/update_intro/{id}', 'Admin\IntroController@update_intro')->name('update_intro');
Route::get('home', 'Client\ClientController@get_home')->name('home');

Route::post('/quickview', 'Admin\ProductController@quickview');

Route::group(['prefix' => 'cli', 'namespace' => 'Client'], function () {
   Route::get('/index', 'ClientController@index')->name('cli_index');
   Route::post('/search/', 'ClientController@search')->name('cli_search');
   Route::get('/dangxuat_kh', 'ClientController@dangxuatkh')->name('dangxuat_kh');
   Route::get('/delivery', 'CheckoutController@delivery');
   Route::post('/select-delivery-home', 'CheckoutController@select_delivery_home');
   Route::get('/checkout', 'CheckoutController@checkout')->name('checkout');
   Route::post('/load-comment', 'ClientController@load_comment');
   Route::post('/send-comment', 'ClientController@send_comment');
   Route::get('/gioithieu', 'ClientController@gioithieu')->name('gioithieu');
   Route::get('/khuyenmai', 'ClientController@khuyenmai')->name('khuyenmai');
   Route::get('/lienhe', 'ClientController@lienhe')->name('lienhe');
});

Route::get('/detail/{id}', 'Client\ClientController@detail')->name('cli_detail');
Route::get('/list-pro/{id}', 'Client\ClientController@list_pro')->name('list_pro');
Route::post('/cart', 'Client\CartController@addtocart')->name('addtocart');
Route::patch('update-cart', 'Client\CartController@update');
Route::delete('remove-from-cart', 'Client\CartController@remove');
Route::post('/select-delivery-home', 'Client\CheckoutController@delivery_home');


Route::group(['prefix' => 'cli_check', 'namespace' => 'Client'], function () {
   Route::post('/dangky', 'CheckoutController@dangky')->name('dangky');
   Route::get('xacnhantaikhoan', 'CheckoutController@xacnhanTK')->name('xacnhanTK');
   Route::post('/dangnhap', 'CheckoutController@dangnhap')->name('dangnhap');
   Route::get('/payment', 'CheckoutController@payment')->name('payment');

   Route::post('/postlaymk', 'CheckoutController@postSendcoderesetpassowrd')->name('postlaymk');
   Route::get('/getdoimk', 'CheckoutController@getdoimk')->name('getdoimk');
   Route::post('/postdoimk', 'CheckoutController@postdoimk')->name('postdoimk');
   Route::post('/password', 'CheckoutController@UpdatePassword')->name('UpdatePassword');
   Route::post('/savepassword', 'CheckoutController@SaveUpdatePassword')->name('SaveUpdatePassword');
});

Route::get('/delivery', 'Client\DeliveryController@delivery');
Route::post('/select-delivery', 'Client\DeliveryController@select_delivery');
Route::post('/insert-delivery', 'Client\DeliveryController@insert_delivery');
Route::post('/select-feeship', 'Client\DeliveryController@select_feeship');
Route::post('/update-delivery', 'Client\DeliveryController@update_delivery');
Route::post('/calculate-fee', 'Client\CheckoutController@calculate_fee');
Route::get('/del-fee', 'Client\CheckoutController@del_fee');
Route::post('/confirm-order', 'Client\CheckoutController@confirm_order');
Route::post('/confirm-order1', 'Client\CheckoutController@confirm_order1');
Route::post('online-checkout', 'Client\CheckoutController@online_checkout');
// $route['/online-checkout']['POST']='Client\CheckoutController@online_checkout';

Route::get('/thankyou', 'Client\ClientController@thankyou')->name('thank');
Route::get('/history', 'Admin\OrderController@history');
Route::get('/view-history-order/{order_code}', 'Admin\OrderController@view_history_order');
Route::post('/tim-kiem', 'Client\ClientController@search');
Route::post('/autocomplete-ajax', 'Client\ClientController@autocomplete_ajax');
Route::post('/insert-rating', 'Client\ClientController@insert_rating');
Route::post('/add-cart-ajax', 'Client\CartController@add_cart_ajax');
Route::get('/danh-muc-bai-viet/{id}', 'Admin\PostController@danh_muc_bai_viet')->name('dm_baiviet');
Route::get('/bai-viet/{post_slug}', 'Admin\PostController@bai_viet');
Route::get('/lien-he', 'Client\ContactController@lien_he');
//dang nhap gg
// Route::get('/login-google', 'Client\CheckoutController@login_google');
// Route::get('/google/callback', 'Client\CheckoutController@callback_google');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/google/callback', 'SocialAuthController@callback');

//profile
Route::get('profile', 'Client\ClientController@profile')->name('profile');
Route::post('profile/update-profile', 'Client\ClientController@update_profile')->name('update_profile');
Route::get('profile/change-password', 'Client\ClientController@change_password')->name('change_password');
Route::post('profile/update-password', 'Client\ClientController@update_password')->name('update_password');
//
Route::post('show-cart', 'Client\ClientController@show');
Route::post('shop', 'Client\ClientController@shopping');
Route::post('giohang', 'Client\ClientController@giohang');
//
Route::get('cli/fetch_data', 'Client\ClientController@fetch_data');























Route::get('/trangchu', 'Admin\AdminController@show_dashboard')->name('cli_trangchu')->middleware('check');
//////PRODUCT/////////////
Route::group(['prefix' => 'product', 'namespace' => 'Admin'], function () {
   // Route::get('index','ProductController@index')->name('pro_index')->middleware('check');
   Route::get('addpro', 'ProductController@addpro')->name('pro_add')->middleware('roles');
   Route::post('them', 'ProductController@themsp')->name('themsp');
   Route::get('edit_pro/{id}', 'ProductController@edit')->name('product_edit')->middleware('roles');
   Route::post('update/{id}', 'ProductController@update')->name('pro_update');
   Route::get('delete/{id}', 'ProductController@delete')->name('delete_pro')->middleware('roles');
   Route::get('delete_all', 'ProductController@delete_all')->name('delete_all');
   Route::get('kichhoat/{id}', 'ProductController@kichhoat')->name('kichhoat');
   Route::get('huykichhoat/{id}', 'ProductController@huykichhoat')->name('huykichhoat');
   Route::get('add_images/{id}', 'ProductController@add_img')->name('add_img')->middleware('roles');
   Route::post('add_images1/{id}', 'ProductController@add_img1')->name('add_img1')->middleware('roles');
   Route::get('del_img/{id}', 'ProductController@del_img')->name('del_img');
   Route::post('/export-csv', 'ProductController@export_csv')->middleware('check');
   Route::post('/import-csv', 'ProductController@import_csv')->middleware('check');
   // Route::get('/show_pro','ProductController@show_product')->middleware('check');
   // Route::get('pagination/fetch_data', 'PaginationController@fetch_data');
   Route::get('/search', 'ProductController@search');
});
///////////CATEGORY//////////////
Route::group(['prefix' => 'category', 'namespace' => 'Admin'], function () {
   Route::get('index', 'CategoryController@index')->name('cate_index')->middleware('check');
   Route::get('addcat', 'CategoryController@addcate')->name('cate_add')->middleware('roles');
   Route::post('themcat', 'CategoryController@themcat')->name('themcat')->middleware('check');
   Route::get('edit_cat/{id}', 'CategoryController@edit')->name('cat_edit')->middleware('roles');
   Route::post('update/{id}', 'CategoryController@update')->name('cate_update')->middleware('roles');
   Route::get('delete/{id}', 'CategoryController@delete')->name('delete_cate')->middleware('roles');

   Route::post('/export-csv', 'CategoryController@export_csv')->middleware('check');
   Route::post('/import-csv', 'CategoryController@import_csv')->middleware('check');
});

///// USER ////////
Route::get('users', 'Admin\UserController@index')->name('user')->middleware('check');
Route::get('add-users', 'Admin\UserController@add_users')->middleware('check');
Route::get('delete-user-roles/{admin_id}', 'Admin\UserController@delete_user_roles')->middleware('check');
Route::post('store-users', 'Admin\UserController@store_users')->middleware('check');
Route::post('assign-roles', 'Admin\UserController@assign_roles')->middleware('check');
Route::get('impersonate/{admin_id}', 'Admin\UserController@impersonate')->middleware('check');
Route::get('impersonate-destroy', 'Admin\UserController@impersonate_destroy');

///// CUSTOMER ////////
Route::get('customers', 'Admin\CustomerController@customer')->name('customer')->middleware('check');
Route::get('delete-customer-roles/{customer_id}', 'Admin\CustomerController@delete_customer_roles')->middleware('check');


//////////// ORDER ////////////
Route::get('/manage-order', 'Admin\OrderController@manage_order');
Route::post('/view-order/{order_code}', 'Admin\OrderController@view_order');
Route::get('/print-order/{checkout_code}', 'Client\CheckoutController@print_order');
Route::post('/update-order-qty', 'Admin\OrderController@update_order_qty');
Route::post('/update-qty', 'Admin\OrderController@update_qty');
Route::post('/huy-don-hang', 'Admin\OrderController@huy_don_hang');
Route::get('/move/{code}', 'Admin\OrderController@move');
Route::get('/success/{code}', 'Admin\OrderController@success');
Route::get('/done/{code}', 'Admin\OrderController@done');

///////////////ATTRIBUTE/////////////
Route::get('/attr', 'Admin\AttrController@add_attr')->name('add_attr')->middleware('check');
Route::post('/them_attr', 'Admin\AttrController@store_attr')->name('store_attr')->middleware('check');
Route::get('/delete-attr/{id}', 'Admin\AttrController@del_attr')->name('del_attr');

//////////////////LOGIN/////////////

Route::get('/register-auth', 'Admin\AuthController@register_auth')->name('regis');
Route::get('/login-auth', 'Admin\AuthController@login_auth')->name('login_auth');
Route::get('/logout-auth', 'Admin\AuthController@logout_auth')->name('logout_auth');
Route::post('/register', 'Admin\AuthController@register');
Route::post('/login1', 'Admin\AuthController@login1');


////////////////ADMIN//////////////

Route::get('/delete-order/{order_code}', 'Admin\OrderController@order_code');
Route::get('/dashboard', 'Admin\AdminController@show_dashboard')->name('trangchu')->middleware('check');
Route::post('/dashboard-filter', 'Admin\AdminController@dashboard_filter');
Route::post('/filter-by-date', 'Admin\AdminController@filter_by_date');
Route::get('/order-date', 'Admin\AdminController@order_date');
Route::post('/days-order', 'Admin\AdminController@days_order');
Route::get('/404', 'Client\ClientController@error_page')->name('404_page');

/////////////////COUPONE//////////////
Route::post('/check-coupon', 'Client\CouponController@check_coupon');
Route::get('/unset-coupon', 'Client\CouponController@unset_coupon');
Route::get('/insert-coupon', 'Client\CouponController@insert_coupon')->name('insert_coupon')->middleware('check');
Route::get('/delete-coupon/{coupon_id}', 'Client\CouponController@delete_coupon')->name('delete_coupon')->middleware('check');
Route::get('/list-coupon', 'Client\CouponController@list_coupon')->name('list_coupon')->middleware('check');
Route::post('/insert-coupon-code', 'Client\CouponController@insert_coupon_code')->name('insert_coupon_code')->middleware('check');


/////////////////POST///////////////

Route::get('/add-post', 'Admin\PostController@add_post')->middleware('check');
Route::get('/all-post', 'Admin\PostController@all_post')->name('all_post')->middleware('check');
Route::get('/delete-post/{post_id}', 'Admin\PostController@delete_post')->middleware('check');
Route::get('/edit-post/{post_id}', 'Admin\PostController@edit_post')->middleware('check');
Route::post('/save-post', 'Admin\PostController@save_post')->middleware('check');
Route::post('/update-post/{post_id}', 'Admin\PostController@update_post')->middleware('check');


//////////////SLIDESHOW///////////////

Route::get('/manage-slider', 'Admin\SliderController@manage_slider')->name('manage_sli')->middleware('check');
Route::get('/add-slider', 'Admin\SliderController@add_slider')->name('add_sli')->middleware('check');
Route::get('/delete-slide/{slide_id}', 'Admin\SliderController@delete_slide')->middleware('check');
Route::post('/insert-slider', 'Admin\SliderController@insert_slider')->middleware('check');
Route::get('/unactive-slide/{slide_id}', 'Admin\SliderController@unactive_slide')->middleware('check');
Route::get('/active-slide/{slide_id}', 'Admin\SliderController@active_slide')->middleware('check');

////////////////INFOMATION////////////////////
Route::get('/information', 'Client\ContactController@information')->middleware('check');
Route::post('/save-info', 'Client\ContactController@save_info')->middleware('check');
Route::post('/update-info/{info_id}', 'Client\ContactController@update_info')->middleware('check');


//////////////////CATEGORY POST//////////////////////
Route::get('/add-category-post', 'Admin\CategoryPost@add_category_post')->middleware('check');
Route::get('/all-category-post', 'Admin\CategoryPost@all_category_post')->name('all_cate_post')->middleware('check');
Route::get('/edit-category-post/{category_post_id}', 'Admin\CategoryPost@edit_category_post')->middleware('check');
Route::post('/save-category-post', 'Admin\CategoryPost@save_category_post')->middleware('check');
Route::post('/update-category-post/{cate_id}', 'Admin\CategoryPost@update_category_post')->middleware('check');
Route::get('/delete-category-post/{cate_id}', 'Admin\CategoryPost@delete_category_post')->middleware('check');


///////////////QUANG CAO//////////////////
Route::get('/quangcao', 'Admin\AddvertisedController@addver')->name('list_addvertised')->middleware('check');
Route::get('/add_addvertised', 'Admin\AddvertisedController@add_addver')->name('add_addvertised')->middleware('check');
Route::get('/edit-addver/{id}', 'Admin\AddvertisedController@edit_q')->name('sua_quangcao')->middleware('check');
Route::post('/store', 'Admin\AddvertisedController@store')->name('store_addvertised')->middleware('check');
Route::get('/delete_addver/{id}', 'Admin\AddvertisedController@destroy')->name('del_addver')->middleware('check');
Route::post('/update_addver/{id}', 'Admin\AddvertisedController@update_addver')->name('update_addver')->middleware('check');

///////////////POP UP QUẢNG CAO//////////////////
Route::get('/popup', 'Admin\PopupController@popup')->name('list_popup')->middleware('check');
Route::get('/add_popup', 'Admin\PopupController@add_popup')->name('add_popup')->middleware('check');
Route::get('/edit-popup/{id}', 'Admin\PopupController@edit_q')->name('sua_popup')->middleware('check');
Route::post('/store', 'Admin\PopupController@store')->name('store_popup')->middleware('check');
Route::get('/delete_popup/{id}', 'Admin\PopupController@destroy')->name('del_popup')->middleware('check');
Route::post('/update_popup/{id}', 'Admin\PopupController@update_popup')->name('update_popup')->middleware('check');

////////////////////CHÍNH SÁCH////////////
Route::get('/chinhsach', 'Admin\chinhsachController@index')->name('chinh')->middleware('check');
Route::get('/create_po', 'Admin\chinhsachController@created')->middleware('check');
Route::post('/save_po', 'Admin\chinhsachController@create_po')->name('add_poli')->middleware('check');
Route::get('/update_po/{id}', 'Admin\chinhsachController@updated')->name('sua')->middleware('check');
Route::post('/save_up/{id}', 'Admin\chinhsachController@store_po')->name('store_po')->middleware('check');
Route::get('delete_po/{id}', 'Admin\chinhsachController@delete_po')->name('del_po')->middleware('check');
Route::get('cli_poli/{id}', 'Client\ClientController@chinhsach');

/////////////////////////COMMENT//////////////
Route::post('/allow-comment', 'Client\ClientController@allow_comment')->middleware('check');
Route::post('/reply-comment', 'Client\ClientController@reply_comment')->middleware('check');
Route::get('/comment', 'Client\ClientController@list_comment')->middleware('check');

//////////////////// GIỚI THIỆU////////////////////

Route::get('/introduce', 'Admin\IntroController@intro_index')->name('intro')->middleware('check');
Route::post('/store_intro', 'Admin\IntroController@store_intro')->name('store_intro')->middleware('check');


Route::post('/xoanhieu', 'Admin\ProductController@xoanhieu');
Route::get('/pagination', 'Admin\ProductController@index')->name('pro_index');
Route::get('pagination/fetch_data', 'Admin\ProductController@fetch_data');
