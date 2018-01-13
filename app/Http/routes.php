<?php

Route::auth();

Route::get('admin', 'BaseController@dashboard');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('reservation', function () {
        return view('admin.reservation.date');
    });
    Route::post('reservation', 'ReservationController@store');
    Route::get('reservation/check', 'ReservationController@check');
    Route::put('reservation/{id}', 'ReservationController@update');
    Route::get('reservation/room/{date}', 'ReservationController@index');
    
    Route::get('banner/sort', 'BannerController@sortPage');
    Route::post('banner/sort', 'BannerController@sort');
    Route::resource('banner', 'BannerController');

    Route::resource('about', 'AboutController');
    Route::resource('contact', 'ContactController');
    Route::resource('reservationinfo', 'ReservationInfoController');

    Route::get('room/sort', 'RoomController@sortPage');
    Route::post('room/sort', 'RoomController@sort');
    Route::resource('room', 'RoomController');

    Route::delete('gallery/gallery/{id}','GalleryController@galleryUpload');    
    Route::post('gallery/gallery','GalleryController@galleryUpload');    
    Route::get('gallery/sort', 'GalleryController@sortPage');
    Route::post('gallery/sort', 'GalleryController@sort');
    Route::resource('gallery', 'GalleryController');

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
    Route::get('reservation', 'WebController@reservation');
    Route::get('contact', 'WebController@contact');

    Route::get('{web}', function ($web) {
        return view('web.' . $web);
    });
});