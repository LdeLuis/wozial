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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::middleware('api')->get('/test_api', function () {
        return '
            <h1>
                API test: Datos del front v1
            </h1>
        ';
    });
    
    Route::middleware('api')->get('/test_admin', function () {
        return '
            <h1>
                API test: Datos del admin v1
            </h1>
        ';
    });
});


