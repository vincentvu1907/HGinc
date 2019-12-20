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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

Route::group(["middleware"=>"auth"],function(){

	Route::group(["prefix"=>"home"],function(){
		Route::get('/', 'DashboardController@index')->name('home');
		Route::post('/reports', 'DashboardController@reports')->name('reports');
	});
	Route::group(["prefix"=>"user"],function(){
		Route::get("/profile","AdminController@getProfile")->name("admin.profile");
	});

	
	Route::group(["prefix"=>"article"],function(){
		Route::get("/edit/{id}","PostController@getEdit")->name("article.edit");
		Route::post("/edit/{id}","PostController@update")->name("article.update");
		Route::get("/new","PostController@getNew")->name("article.new");
		Route::post("/new","PostController@store")->name("article.store");
		Route::get("/","PostController@getAll")->name("article.all");
		Route::post("/action","PostController@action")->name("article.action");
		Route::post("/d/{id}","PostController@destroy")->name("article.delete");

		Route::group(["prefix"=>"category"],function(){
			Route::get("/","CategoryController@getAll")->name("category.all");
			Route::post("/new","CategoryController@store")->name("category.store");
			Route::get("/edit/{id}","CategoryController@getEdit")->name("category.edit");
			Route::post("/edit/{id}","CategoryController@update")->name("category.update");
			Route::post("/d/{id}","CategoryController@destroy")->name("category.delete");
			Route::post("/action","CategoryController@action")->name("category.action");
		});

		Route::group(["prefix"=>"tag"],function(){
			Route::get("/","TagController@getAll")->name("tag.all");
			Route::post("/new","TagController@store")->name("tag.store");
			Route::get("/edit/{id}","TagController@getEdit")->name("tag.edit");
			Route::post("/edit/{id}","TagController@update")->name("tag.update");
			Route::post("/d/{id}","TagController@destroy")->name("tag.delete");
			Route::post("/suggest","TagController@getSuggestTag")->name("tag.suggest");
		});
	});
	Route::group(["prefix"=>"author"],function(){
		Route::get("/","AuthorController@getAll")->name("author.all");
		Route::get("/edit/{id}","AuthorController@getEdit")->name("author.edit");
		Route::post("/edit/{id}","AuthorController@update")->name("author.update");
		Route::post("/new","AuthorController@store")->name("author.store");
		Route::post("/d/{id}","AuthorController@destroy")->name("author.delete");
	});
	Route::group(["prefix"=>"media"],function(){
		Route::get("/","HelperController@getMedia")->name("helper.media");
	});
	Route::group(["prefix"=>"product"],function(){
		Route::get("/","ProductController@getAll")->name("product.all");
		Route::get("/new","ProductController@getNew")->name("product.new");
		Route::post("/new","ProductController@store")->name("product.store");
		Route::post("/edit/{id}","ProductController@update")->name("product.update");
		Route::get("/edit/{id}","ProductController@getEdit")->name("product.edit");
		Route::post("/d/{id}","ProductController@destroy")->name("product.delete");
	});

	Route::group(["prefix"=>"config"],function(){
		Route::get("/attribute","HelperController@getAttribute")->name("config.attribute");
		Route::post("/store","HelperController@store")->name("config.store");
		
		Route::get("/status","HelperController@getStatus")->name("config.status");
		Route::post("/status","HelperController@updateAttribute")->name("config.update.status");
	});

	Route::group(["prefix"=>"special"],function(){
			Route::get("/","SpecialController@getAll")->name("special.all");
			Route::post("/new","SpecialController@store")->name("special.store");
			Route::get("/edit/{id}","SpecialController@getEdit")->name("special.edit");
			Route::post("/edit/{id}","SpecialController@update")->name("special.update");
			Route::post("/d/{id}","SpecialController@destroy")->name("special.delete");
			Route::post("/action","SpecialController@action")->name("special.action");
	});
});
