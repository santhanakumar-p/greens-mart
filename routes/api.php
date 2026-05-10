<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\OrganizationController;

Route::get('/states', [StateController::class, 'index']);

Route::apiResource('organizations', OrganizationController::class);