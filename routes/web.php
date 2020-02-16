<?php
Route::get('/login', '\App\Http\Controllers\AuthController@login')->name("login");
Route::post('/login', '\App\Http\Controllers\AuthController@check')->name("login.post");

Route::prefix('dashboard')
     ->namespace('\App\Http\Controllers')
     ->group(function (\Illuminate\Routing\Router $router) {

       Route::get('/logout', 'NewsController@logout')->name("dashboard.logout");

       Route::get('/{any}', 'NewsController@home')->name("dashboard.home")->where('any', '.*');

});

Route::prefix('api')
     ->namespace('\App\Http\Controllers')
     ->group(function (\Illuminate\Routing\Router $router) {

       Route::get('/news/list', 'NewsController@listnews')->name("dashboard.news.list");

       Route::post('/news/create', 'NewsController@store')->name("dashboard.news.store");

       Route::get('/news/{id}/', 'NewsController@update')->name("dashboard.news.update");
       Route::put('/news/{id}/', 'NewsController@save')->name("dashboard.news.save");

       Route::delete('/news/{id}/', 'NewsController@delete')->name("dashboard.news.delete");
});
				