<?php

use App\Http\Controllers\API\TaskControler;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users',[UserController::class,'index']);
Route::post('/users',[UserController::class,'store']);

Route::post('/login',[UserController::class,'login']);



Route::post('/tasks',[TaskControler::class,'store']);
Route::get('/tasks',[TaskControler::class,'index']);

Route::post('/employee-tasks',[TaskControler::class,'employeeTasks']);
Route::post('/manager-tasks',[TaskControler::class,'managerTasks']);

