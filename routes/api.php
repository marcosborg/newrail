<?php

// Category
Route::get('categories', function(){
    return \App\Models\Category::all();
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Train
    Route::apiResource('trains', 'TrainApiController');

    // Train Type
    Route::apiResource('train-types', 'TrainTypeApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');

    // Carriage
    Route::apiResource('carriages', 'CarriageApiController');
});
