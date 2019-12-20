<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["prefix"=>"v1","middleware"=>"api_middleware"],function(){
	Route::group(["prefix"=>"article"],function(){
		Route::get("/sticky","Avision\HomeController@getStickyHeader")->name("article.sticky");
		Route::get("/category/{id}","Avision\PostController@getPostByCategory")->name("post.category");
		Route::get("/category-all/{slug}/{page}","Avision\CategoryController@getPost");
		Route::get("/category-child/{slug}/{page}","Avision\CategoryController@getPostChild");
		Route::get("/detail/{slug}","Avision\PostController@getPost");
	});
	Route::group(["prefix"=>"category"],function(){
		Route::get("/nav","Avision\CategoryController@getNavigation")->name("category.nav");
		Route::get("/child/{url}","Avision\CategoryController@getChildCategory")->name("category.child");
		// Route::get("/post/{id}","Avision\CategoryController@getPost");
	});
	Route::get("/config","Avision\HelperController@getConfig")->name("config");
	Route::get("/event","Avision\HelperController@getEvent");
	Route::get("/search-surface/{txt}","Avision\HelperController@getSearch");
	Route::post("/report","Avision\CustomerController@reporting");
	Route::get("/sitemap","Avision\HelperController@sitemap");

	Route::get("/scout/{query}","Avision\HelperController@scout");
});