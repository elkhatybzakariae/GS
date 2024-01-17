<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [HomeController::class,'index']);


Route::group(['middleware' => 'api'], function () {
    Route::get('/gestiondescomptes', [UserController::class, 'gestiondescomptes'])->name('api.gestiondescomptes');
    Route::get('/roleindex', [RoleController::class, 'roleindex'])->name('api.roleindex');
    Route::get('/role/create', [RoleController::class, 'rolecreate'])->name('api.rolecreate');
    Route::post('/role/store', [RoleController::class, 'rolestore'])->name('api.rolestore');
    Route::delete('/delete/role/{id}', [RoleController::class, 'deleterole'])->name('api.deleterole');
    Route::get('/edit/user/{id}', [UserController::class, 'edituser'])->name('api.edituser');
    Route::put('/update/user/{id}', [UserController::class, 'updateuser'])->name('api.updateuser');
});