<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Projects\ProjectController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::group([
    'middleware'=> 'api',
    'prefix'=>'auth'
],function(){
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/refresh',[AuthController::class,'refresh']);
});
*/
//Route::controller(AuthController::class)->group();
Route::middleware('api')->prefix('auth')->controller(AuthController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/register','register');
    Route::post('/refresh','refresh');
    Route::get('/home','hello');
});

Route::middleware('api')->prefix('projects')->controller(ProjectController::class)->group(function(){
    Route::post('/create-project','CrearProyecto');
    Route::post('/add-rol','AgregarRolProyecto');
    Route::get('/all-projects','index');
});
