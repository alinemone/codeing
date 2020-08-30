<?php

/***************************** Admin Route ***********************************/



Route::middleware(['isAdmin'])->namespace('Admin')->prefix('admin')->group(function () {
    route::get('/','AdminController@index')->name('AdminPanel');
    route::get('users','UserController@allUsers')->name('allUsers');


    Route::middleware(['isMethodPost'])->group(function () {
        route::post('role/add_role_to_user','RoleController@roleAddToUser')->name('roleAddToUser');
        route::post('role/add_delete_to_user','RoleController@roleDeleteToUser')->name('roleDeleteToUser');

        route::post('role/add_permission_to_role','RoleController@AddPermissionsToRole')->name('AddPermissionsToRole');
        route::post('role/delete_permission_to_role','RoleController@DeletePermissionsToRole')->name('DeletePermissionsToRole');
    });

    route::resource('role','RoleController');
    route::resource('permission','PermissionController');
    route::resource('category','CategoryController');
    route::resource('product','ProductController');
    route::get('unverified','ProductController@unverified')->name('product.unverified');
    route::get('delete','ProductController@delete')->name('product.delete');
    route::get('market/sell','SellController@sell')->name('market.sell');
    route::get('comments','CommentController@index')->name('admin.comments');


    Route::prefix('product')->group(function (){
       route::post('/{product}/seo/','ProductController@seo')->name('product.seo.update');
       route::post('/{product}/tags/','ProductController@tags')->name('product.tags.update');
       route::post('/{product}/status/','ProductController@status')->name('product.status.update');
       route::post('/{product}/file/','ProductController@file')->name('product.file.update');
       route::post('/{id}/restore/','ProductController@restore')->name('product.restore');
    });



});
/***************************** User Route ***********************************/
Route::middleware([ 'auth'])->namespace('User')->prefix('user')->group(function (){

    route::get('/','PanelController@index')->name('UserPanel');

    route::get('profile_edit','PanelController@profile_edit')->name('profile_edit');
    route::post('/{user_id}/save_profile_edit','UserController@save_profile_edit')->name('save_profile_edit');

    route::get('account_edit','PanelController@account_edit')->name('account_edit');
    route::post('/{user_id}/account_edit','PanelController@save_account_edit')->name('save_account_edit');

    route::get('change_password','PanelController@change_password')->name('change_password');
    route::post('/{user_id}/change_password','PanelController@save_change_password')->name('save_change_password');

    route::get('join','UserController@join')->middleware('join')->name('join');
    route::post('information_user_join','UserController@information_user_join')->name('information_user_join');

    route::get('/products/purchased','PanelController@purchased')->name('user.products.purchased');

    route::get('/payments','PaymentController@payments')->name('user.payments');



});

/***************************** Seller Route ***********************************/
Route::middleware([ 'isSeller'])->namespace('User')->group(function (){

    route::get('product/create/{category?}','ProductController@create')->name('user_create_product');

    route::post('product/store/{category?}','ProductController@store')->name('user_store_product');
//Dropzone Uploding
    route::get('product/uploads','ProductController@uploadview')->name('user.create.product.upload');

    route::post('product/uploads/image1/{product}','ProductController@smallimage')->name('user.upload.small.image');
    route::post('product/uploads/image2/{product}','ProductController@largeimage')->name('user.upload.large.image');
    route::post('product/uploads/file/{product}','ProductController@file')->name('user.upload.file');

    Route::prefix('user')->group(function (){
        route::get('/products/approved','PanelController@approved')->name('user.products');
        route::get('/products/disapproved','PanelController@disapproved')->name('user.products.disapproved');

    });
    route::get('/seller/income','PaymentController@sellerIncome')->name('seller.income');
    route::get('/seller/sales','PaymentController@sellerSales')->name('seller.sales');

});
/***************************** Public Route ***********************************/

Route::middleware([ 'auth','verified'])->group(function (){

    route::post('product/payment','PaymentController@payment')->name('payment');
    route::get('product/payment/checker','PaymentController@checker')->name('payment.checker');

    route::post('/comment','CommentController@store');
    route::post('/child/comment','CommentController@store');

});


Route::get('/', 'HomeController@index')->name('index');
Route::get('home', 'HomeController@index');
Route::get('dmca', 'HomeController@dmca')->name('dmca');
Route::post('/ckfinder/connector?command=QuickUpload&type=Images&responseType=json')->name('ckfinder');


Auth::routes(['verify' => true]);

Route::get('category/{category}/{category1?}','CategoryController@index')->name('viewCategory');
Route::get('tag/{tagSlug}','TagsController@index')->name('viewTag');

Route::get('/item/{productSlug}','ProductController@single')->name('Product.single');
Route::get('/item/{productSlug}/comments','ProductController@single')->name('Product.single.comments');
Route::get('/api/{product}/comments','ProductController@sendCommentToSngle');


Route::middleware(['storeActive'])->group(function (){
    Route::get('author/{username}','StoreController@author')->name('author');
    Route::get('store/{userStore}','StoreController@store')->name('userStore');
});

Route::get('search','SearchController@search')->name('search');
Route::get('products/search', 'SearchController@vuesearch')->name('vueSearch');

Route::get('download/{product}','DownloadController@download')->name('product.download');







