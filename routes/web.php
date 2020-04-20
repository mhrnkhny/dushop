<?php

//------------------------------web route--------------------------
Auth::routes(['verify'=>true]);

Route::prefix('/')->namespace('site')->group(function () {
    //----------------------------home content ---------------------
    Route::get('/', 'SiteController@index')->name('homeIndex');
    //----------------------------product information----------------
    Route::get('home/{id}', 'productShowController@product_page')->name('product.page');
    Route::get('/allproduct', 'productShowController@allProduct')->name('allProduct');
    //-----------------------------comment----------------------------
    Route::get('comment','CommentController@showComment')->name('show.comment')->middleware('auth');
    Route::post('product/comment', 'CommentController@commentStore')->name('store.comment');
    //------------------------------like && dislike-------------------
    Route::get('reply/like/{id}', 'LikeController@Like')->name('like')->middleware('auth');
    Route::get('reply/disLike/{id}', 'LikeController@DisLike')->name('dis.like');
    //---------------------profile----------------------------------
    Route::get('profile', 'profileController@profile')->name('profile');
    Route::get('profile/info', 'profileController@Information')->name('Info');
    Route::post('profile/info/create', 'profileController@storeInfo')->name('store.Info');
    Route::get('register/edit/{id}', 'profileController@editProdfile')->name('edit.profile');
    Route::post('register/{id}', 'profileController@updateInfo')->name('update.Info');
});


//--------HomeController with __construct(auth)-------------
Route::prefix('/')->middleware('auth')->group(function (){
    //-----------------------star rating---------------------------
    Route::post('posts', 'HomeController@storeStar')->name('star');
    //-------------------------cart-----------------------------------
    Route::get('cart','Homecontroller@cart')->name('cart');
    Route::post('cart/add','site\productShowController@productAdd');
    //--------------------------payment-----------------------------
    Route::post('product/payment','site\paymentController@payment')->name('payment');
    Route::post('product/callBack','site\paymentController@callBack')->name('callBack');
    Route::get('factor','HomeController@factor')->name('factor');

});
