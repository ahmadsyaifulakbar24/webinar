<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('API')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::post('auth/login', 'LoginController');
        Route::post('auth/registration', 'RegistrationController');
    });
    
    Route::namespace('Param')->prefix('param')->group(function () {
        Route::get('province', 'GetParamController@province');
        Route::get('city', 'GetParamController@city');
    });
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::namespace('Auth')->group(function () {
            Route::post('auth/logout', 'LogoutController');
        });
    
        Route::namespace('Param')->prefix('param')->group(function () {
            Route::get('unit', 'GetParamController@unit');
            Route::get('sub_unit', 'GetParamController@sub_unit');
            Route::get('role', 'GetParamController@role');
        });
    
        
        Route::namespace('User')->prefix('user')->group(function () {
            Route::get('fetch/{user_id?}', 'GetUserController@fetch');
            Route::post('update/{user:id}', 'UpdateUserController');
            Route::delete('delete/{user:id}', 'DeleteUserController');
        });
    
        Route::namespace('Training')->prefix('training')->group(function () {
           Route::post('create', 'CreateTrainingController@create');
           Route::post('create_theory', 'CreateTrainingController@create_theory');
           Route::post('update/{training:id}', 'UpdateTrainingController@update');
           Route::post('update_theory/{theory:id}', 'UpdateTrainingController@update_theory');
           Route::get('fetch/{training_id?}', 'GetTrainingController@fetch');
           Route::get('fetch_theory/{theory_id?}', 'GetTrainingController@fetch_theory');
           Route::delete('delete/{training:id}', 'DeleteTrainingController@delete');
           Route::delete('delete_theory/{theory:id}', 'DeleteTrainingController@delete_theory');
           Route::patch('create_certificate/{training:id}', 'CertificateController@create');
        });
    
        Route::namespace('Registration')->prefix('registration')->group(function () {
            Route::post('create', 'CreateRegistrationController@create');
            Route::get('fetch/{registration_id?}', 'GetRegistrationController@fetch');
            Route::delete('delete/{registration:id}', 'DeleteRegistrationController');
        });
    });
});
