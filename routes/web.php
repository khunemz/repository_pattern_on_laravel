<?php


Route::group(['middleware' => ['web']] , function () {
  Route::resource('blogs', 'BlogsController');
});