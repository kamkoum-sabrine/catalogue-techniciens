<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\SousSpecialiteController;
use App\Http\Controllers\AuthentificationController;

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::group(['prefix' => '/prestataire'], function () {
        Route::get('/show', [PrestataireController::class, 'show']);
        Route::put('/accept/{id}', [PrestataireController::class, 'accept']);
        Route::put('/refuse/{id}', [PrestataireController::class, 'refuse']);

    });
    Route::group(['prefix' => '/roles'], function () {
        Route::get('/getAll', [RoleController::class, 'getAll']); 
    });
    Route::group(['prefix' => '/client'], function () {
        Route::get('/getAll', [ClientController::class, 'show']);
        Route::put('/activate/{id}', [ClientController::class, 'ActivateAccount']);
        Route::put('/desactivate/{id}', [ClientController::class, 'DesactivateAccount']);
    });
    Route::group(['prefix' => '/specialites'], function () {
        // Route::get('/getAll', [SpecialiteController::class, 'getAll']); 
        Route::get('/getSpecialite/{id}',[SpecialiteController::class, 'getSpectialiteSousSpecialite']);
        Route::post('/create',[SpecialiteController::class, 'create']);
        Route::put('/update/{id}',[SpecialiteController::class, 'update']);
        Route::delete('/delete/{id}',[SpecialiteController::class, 'delete']);
        Route::get('/find/{name}',[SpecialiteController::class, 'find']);
    
    });
    Route::group(['prefix' => '/sousSpecialite'], function () {
        // Route::get('/index/{name}', [SousSpecialiteController::class, 'index']); 
        Route::get('/find/{id}', [SousSpecialiteController::class, 'findSousSpecialite']); 
        Route::post('/create', [SousSpecialiteController::class, 'create']); 
        Route::put('/update/{id}', [SousSpecialiteController::class, 'update']); 
        Route::delete('/delete/{id}', [SousSpecialiteController::class, 'delete']); 
        Route::get('/getAll', [SousSpecialiteController::class, 'getAll']); 
       
    
    });
    
    Route::post('/sign-out', [AuthentificationController::class, 'logout']);
});

Route::group(['prefix' => '/roles'], function () {
    Route::get('/getAll', [RoleController::class, 'getAll']); 
});
Route::group(['prefix' => '/specialites'], function () {
    Route::get('/getAll', [SpecialiteController::class, 'getAll']); 
    // Route::get('/getSpecialite/{id}',[SpecialiteController::class, 'getSpectialiteSousSpecialite']);

});
Route::group(['prefix' => '/sousSpecialite'], function () {
    Route::get('/index/{name}', [SousSpecialiteController::class, 'index']); 
    // Route::get('/find/{id}', [SousSpecialiteController::class, 'findSousSpecialite']); 
   

});



Route::post('/login', [AuthentificationController::class, 'login']);
// Route::get('/role/getAll', [RoleController::class, 'getAll']);
// Route::get('/specialite/getAll', [RoleController::class, 'getAll']);
Route::post('/register', [AuthentificationController::class, 'register']);
Route::get('/unique/{id}',[AuthenticationController::class, 'unique']);