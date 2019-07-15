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

//<editor-fold defaultstate="collapsed" desc="Agreement">
Route::apiResources([
    'agreements' => 'API\AgreementController',
]);
Route::post('/agreementsBy', 'API\AgreementController@filterBy');
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Post Collection">
Route::apiResources([
    'post_collections' => 'API\PostCollectionController',
]);
Route::post('/postcollectionsBy', 'API\PostCollectionController@filterBy');
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Patient">
Route::apiResources([
    'patients' => 'API\PatientController',
]);
Route::post('/patientsBy', 'API\PatientController@filterBy');
//</editor-fold>

//<editor-fold defaultstate="collapsed" desc="Doctor">
Route::apiResources([
    'doctors' => 'API\DoctorController',
]);
Route::post('/doctorsBy', 'API\DoctorController@filterBy');
//</editor-fold>

