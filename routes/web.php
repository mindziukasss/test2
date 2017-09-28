<?php



Route::get('/', 'PostsController@publicHomePage');

Auth::routes();

Route::resource('posts', 'PostsController');
