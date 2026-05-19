<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\UserController;

Route::apiResource('/states', StateController::class);

Route::apiResource('organizations', OrganizationController::class);

Route::apiResource('users', UserController::class);
