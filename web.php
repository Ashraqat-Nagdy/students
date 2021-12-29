<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\blogController;
//use App\Http\Controllers\formController;

// use App\Http\Controllers\form;
use App\Http\Controllers\stdController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('blog/createblog',[blogController::class,'create']);
// Route::post('blog/store',[blogController::class,'store']);


//form
// Route::get('form/createForm',[formController::class,'create']);
// Route::post('form/confirmation',[formController::class],'confirmation');

// Route::get('users/form',[form::class,'create']);

// Route::post('users/success',[form::class,'success']);



// Route::get('blog/createblog',[blogController::class,'create']);
// Route::get('blog/index',[blogController::class,'blog']);


//students
Route::get('students/create',[stdController::class,'create']);
Route::post('students',[stdController::class,"storeInfo"]);
Route::get('students',[stdController::class,"index"]);
Route::get('students/remove/{id}',[stdcontroller::class,"destroy"]);
Route::get('students/edit/{id}',[stdcontroller::class,"edit"]);
Route::get('students/edit/{id}',[stdcontroller::class,"edit"]);
Route::post('students/update', [stdcontroller::class, 'update']);
