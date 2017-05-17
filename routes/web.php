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
Auth::routes();
Route::get('/', 'MainController@index');


Route::get('/home', 'HomeController@index');


Route::get('/logout',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');

$router->group(['prefix' => 'api/v1'], function ($router) {
    // Аутентификация приложений...
    $router->post('/auth/app', 'Api\AuthController@authenticateApp');

    // Аутентификация пользователей...
    $router->post('/auth/user', 'Api\AuthController@authenticateUser')->middleware('auth.api.app');
    $router->post('/auth/user/logout', 'Api\AuthController@logoutUser')->middleware('auth.api.user');

    // Тестовые  маршруты
    $router->post('/application-data', 'Api\HomeController@appData')->middleware('auth.api.app');
    $router->get('/user-data', 'Api\HomeController@userData');

    $router->get('/user-data', 'Api\HomeController@userData')->middleware('auth.api.user');
});



// авторизация приложения для доступа к данным пользователя...
$router->get('/authorize', 'HomeController@showAuthorizationForm')->middleware('web'); 
$router->post('/authorize', 'HomeController@authorizeApp')->middleware('web'); 
Auth::routes();

