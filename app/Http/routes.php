<?php

Route::group(['middleware' => ['web']], function () {
  Route::get('/', [
      'uses' => '\Chatty\Http\Controllers\HomeController@index',
      'as'   => 'home'
  ]);

  Route::get('/alert', function() {
    return redirect()->route('home')->with('info', 'You have signed up!');
  });

  /**
   * Authentication
   */
  Route::get('/signup', [
    'uses'       => '\Chatty\Http\Controllers\AuthController@getSignup',
    'as'         => 'auth.signup',
    'middleware' => ['guest']
  ]);

  Route::post('/signup', [
    'uses'       => '\Chatty\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest']
  ]);

  Route::get('/signin', [
    'uses'       => '\Chatty\Http\Controllers\AuthController@getSignin',
    'as'         => 'auth.signin',
    'middleware' => ['guest']
  ]);

  Route::post('/signin', [
    'uses' => '\Chatty\Http\Controllers\AuthController@postSignin'
  ]);

  Route::get('/signout', [
    'uses' => '\Chatty\Http\Controllers\AuthController@getSignout',
    'as'   => 'auth.signout'
  ]);

  Route::get('/search', [
    'uses' => '\Chatty\Http\Controllers\SearchController@getResults',
    'as'   => 'search.results'
  ]);
});

