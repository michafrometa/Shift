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



//<editor-fold defaultstate="collapsed" desc="Autentication">
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//</editor-fold>


//<editor-fold defaultstate="collapsed" desc="ServiceOrder">
    Route::apiResources([
        'service_order' => 'API\ServiceOrderController',
    ]);
//</editor-fold>



