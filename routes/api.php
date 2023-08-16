<?php

// Category
Route::prefix('categories')->group(function () {
    Route::get('/', function () {
        return \App\Models\Category::all();
    });
    Route::get('/{category_id}', function ($category_id) {
        return \App\Models\Category::find($category_id);
    });
});
//Product
Route::prefix('products')->group(function () {
    Route::get('category/{category_id}', function ($category_id) {
        return \App\Models\Product::where('category_id', $category_id)->get();
    });
});

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');
    Route::get('user', 'UsersApiController@user');
    Route::post('user-update', 'UsersApiController@userUpdate');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Train
    Route::apiResource('trains', 'TrainApiController');

    // Train Type
    Route::apiResource('train-types', 'TrainTypeApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');
    Route::get('confirm-received/{order_id}', 'OrderApiController@confirmReceived');
    Route::get('my-orders', 'OrderApiController@myOrders');

    // Carriage
    Route::get('carriages/{train_id}', 'CarriageApiController@index');
});