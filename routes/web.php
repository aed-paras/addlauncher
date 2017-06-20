<?php

Route::get('/', function () {
    return redirect(url('/login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');






// ADMIN ROUTES

Route::group(['prefix' => 'admin', 'middleware' => 'adminauth', 'namespace' => 'admin'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/users', 'UserController@index');


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
        Route::put('/line/{id}', 'LineController@update');
        Route::delete('/line/{id}', 'LineController@destroy');

        // Stations
        Route::get('/station/{line_id}', 'StationController@index');
        Route::post('/station', 'StationController@store');
        Route::put('/station/{id}', 'StationController@update');
        Route::delete('/station/{id}', 'StationController@destroy');
        
        // Panels
        Route::get('/panel/{station_id}', 'PanelController@index');
        Route::get('/panel/create/{station_id}', 'PanelController@create');
        Route::post('/panel', 'PanelController@store');
        Route::put('/panel/{id}', 'PanelController@update');
        Route::delete('/panel/{id}', 'PanelController@destroy');
        
        // Area
        Route::get('/area', 'AreaController@index');
        Route::post('/area', 'AreaController@store');
        Route::put('/area/{id}', 'AreaController@update');
        Route::delete('/area/{id}', 'AreaController@destroy');
        
        // Panel Types
        Route::get('/panel_type', 'PanelTypeController@index');
        Route::post('/panel_type', 'PanelTypeController@store');
        Route::put('/panel_type/{id}', 'PanelTypeController@update');
        Route::delete('/panel_type/{id}', 'PanelTypeController@destroy');
        
    });


});