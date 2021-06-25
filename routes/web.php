<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/user/area/{area}', 'User\AreaController@store')->name('user.area.store');

Route::group(['prefix' => '/{area}'], function () {

    /**
     * Category
     */
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/', 'Category\CategoryController@index')->name('category.index');

        Route::group(['prefix' => '/{category}'], function () {
            Route::get('listings', 'Listing\ListingController@index')->name('listings.index');
        });
    });
    
    /**
     * Listings
     */
    Route::group(['prefix' => '/listing', 'namespace' => 'Listing'], function () {
        Route::get('/favorites', 'ListingFavoriteController@index')->name('listings.favorites.index');
        Route::post('/{listing}/favorites', 'ListingFavoriteController@store')->name('listings.favorites.store');
        Route::delete('/{listing}/favorites', 'ListingFavoriteController@destroy')->name('listings.favourites.destroy');
    });

    Route::get('/{listing}', 'Listing\ListingController@show')->name('listings.show');
});