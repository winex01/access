<?php

/*
|--------------------------------------------------------------------------
| Winex01\Access Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Winex01\Access package.
|
*/

/**
 * User Routes
 */

// Route::group([
//     'middleware'=> array_merge(
//     	(array) config('backpack.base.web_middleware', 'web'),
//     ),
// ], function() {
//     Route::get('something/action', \Winex01\Access\Http\Controllers\SomethingController::actionName());
// });


/**
 * Admin Routes
 */

// Route::group([
//     'prefix' => config('backpack.base.route_prefix', 'admin'),
//     'middleware' => array_merge(
//         (array) config('backpack.base.web_middleware', 'web'),
//         (array) config('backpack.base.middleware_key', 'admin')
//     ),
// ], function () {
//     Route::crud('some-entity-name', \Winex01\Access\Http\Controllers\Admin\EntityNameCrudController::class);
// });