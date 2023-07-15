<?php
/*
 * Copyright (c) 2023. LF Backend Developer Assessment by Josie Noli Darang.
 */

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
 * Authentication API Route
 */
Route::prefix('auth')
    ->middleware('api')
    ->group(function (){
    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('logout', [AuthenticationController::class, 'logout'])
        ->middleware('auth:api');
    Route::post('refresh', [AuthenticationController::class, 'refresh'])
        ->middleware('auth:api');

});

/*
 * User Security Control
 *
 * API Route for Roles
 */
Route::prefix('security')
    ->middleware(['api', 'auth:api'])
    ->group(function (){
        Route::get('roles', [RoleController::class, 'roleList'])->middleware('role_or_permission:SUPER_USER|ADMIN|View Role');
        Route::get('permissions', [RoleController::class, 'permissionList'])->middleware('role_or_permission:SUPER_USER|ADMIN|View Permissions');
    });

/*
 * Profile API Route View
 */
Route::prefix('profile')
    ->middleware(['auth:api', 'api'])
    ->group(function (){
        Route::get('/', [AuthenticationController::class, 'me']);
    });