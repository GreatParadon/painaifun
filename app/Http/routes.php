<?php

Route::auth();

Route::get('admin', 'BaseController@dashboard');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('banner/sort', 'BannerController@sortPage');
    Route::post('banner/sort', 'BannerController@sort');
    Route::resource('banner', 'BannerController');

    Route::resource('about', 'AboutController');

    Route::get('room/sort', 'RoomController@sortPage');
    Route::post('room/sort', 'RoomController@sort');
    Route::resource('room', 'RoomController');

    Route::resource('rate', 'RateController');
    Route::resource('subroom', 'SubRoomController');

    foreach (['room'] as $r) {
        Route::delete($r . '/gallery/{id}', ucfirst($r) . 'Controller@galleryDestroy');
        Route::post($r . '/gallery', ucfirst($r) . 'Controller@galleryUpload');
    }

});

Route::post('wysiwyg_upload', 'BaseController@wysiwygUpload');


Route::group(['namespace' => 'Web'], function () {
    Route::resource('accommodation', 'AccommodationController');
    Route::get('', 'WebController@index');
    Route::get('about', 'WebController@about');

    Route::get('{web}', function ($web) {
        return view('web.' . $web);
    });
});