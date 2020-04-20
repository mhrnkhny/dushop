<?php
//------------------------------admin route--------------------------
Route::Resources([
    'panel' => 'panelController',
    'user' => 'UserController',
    'phones' => 'PhonesController',
    'address' => 'AddressController',
    'product' => 'ProductController',
    'galery' => 'GaleryController',
    'size' => 'SizeController',
    'coupon' => 'CouponController',
    'slider' => 'SliderController',
    'comment' => 'CommentController',
    'property' => 'panelController',
    'color' => 'ColorController',
]);
