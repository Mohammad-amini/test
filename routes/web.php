<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', 
	// [App\Http\Controllers\UserController:class, 'index']
	// 'App\Http\Controllers\UserController@index'
	[MainController::class, 'index']
);
Route::group(['prefix' => 'users'], function(){
	Route::get('/', function(){
		return [];
	});
	Route::get('add', 
		// 'App\Http\Controllers\UserController@createUsers'
		[UserController::class, 'createUsers']
	);
});

Route::group(['prefix' => 'advertises'], function(){
	Route::get('/', [MainController::class, 'index']);
	Route::get('add', [MainController::class, 'createAdvertise'])->middleware('auth');;
	Route::post('add', [MainController::class, 'saveAdvertise'])->middleware('auth');;
	Route::get('my-ads', [MainController::class, 'getMyAds'])->middleware('auth');;
	Route::post('search', [MainController::class, 'search']);
	Route::get('{id}', [MainController::class, 'getAds']);
});
Route::group(['prefix' => 'categories'], function(){
	Route::get('add', [MainController::class, 'createCategories'])->middleware('auth');;
	Route::get('{id}', [MainController::class, 'getAdvertisesByCategory']);
});
Route::get('login', [loginController::class, 'index']);
Route::get('logout', [loginController::class, 'logout'])->middleware('auth');;
Route::post('login', [loginController::class, 'authenticate']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'register']);
// Route::get('/', 'UserController@index');
// Route::get()