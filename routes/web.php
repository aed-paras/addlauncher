<?php

Route::get('/', function () {
    return redirect(url('/login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');







// ADMIN ROUTES

Route::group(['prefix' => 'admin', 'middleware' => 'adminauth', 'namespace' => 'admin'], function () {
    
    Route::get('/', 'HomeController@index');

    Route::get('/dashboard', 'HomeController@dashboard');

    Route::get('/users', 'UserController@index');

    Route::get('/categories', 'CategoryController@index');

    Route::get('/orders', 'OrderController@index');


    // METRO Group
    Route::group(['prefix' => 'metro', 'namespace' => 'metro'], function () {

        // Metro Home Page
        Route::get('/', 'MetroController@index');

        // Cities
        Route::get('/city', 'CityController@index');
        Route::post('/city', 'CityController@store');
        Route::put('/city/{id}', 'CityController@update');
        Route::delete('/city/{id}', 'CityController@destroy');
        
        // Lines
        Route::get('/line/{city_id}', 'LineController@index');
        Route::post('/line', 'LineController@store');
        Route::get('/line/edit/{city_id}', 'LineController@edit');
        Route::put('/line/{id}', 'LineController@update');
        Route::delete('/line/{id}', 'LineController@destroy');
            // Ajax Routes
            Route::get('/line/description/{id}', 'LineController@description');

        // Stations
        Route::get('/station/{line_id}', 'StationController@index');
        Route::post('/station', 'StationController@store');
        Route::get('/station/edit/{city_id}', 'StationController@edit');
        Route::put('/station/{id}', 'StationController@update');
        Route::delete('/station/{id}', 'StationController@destroy');
            // Ajax Routes
            Route::get('/station/description/{id}', 'StationController@description');
        
        // Panels
        Route::get('/panel/{station_id}', 'PanelController@index');
        Route::get('/panel/create/{station_id}', 'PanelController@create');
        Route::post('/panel', 'PanelController@store');
        Route::put('/panel/{id}', 'PanelController@update');
        Route::delete('/panel/{id}', 'PanelController@destroy');

        Route::resource('area', 'AreaController');

        Route::resource('panel_type', 'PanelTypeController');

        Route::resource('vendor', 'VendorController');
        
        // Area
        // Route::get('/area', 'AreaController@index');
        // Route::post('/area', 'AreaController@store');
        // Route::put('/area/{id}', 'AreaController@update');
        // Route::delete('/area/{id}', 'AreaController@destroy');
        
        // Panel Types
        // Route::get('/panel_type', 'PanelTypeController@index');
        // Route::post('/panel_type', 'PanelTypeController@store');
        // Route::put('/panel_type/{id}', 'PanelTypeController@update');
        // Route::delete('/panel_type/{id}', 'PanelTypeController@destroy');

        // Vendors
        // Route::get('/vendor', 'VendorController@index');
        // Route::post('/vendor', 'VendorController@store');
        // Route::put('/vendor/{id}', 'VendorController@update');
        // Route::delete('/vendor/{id}', 'VendorController@destroy');
        
    });


});


