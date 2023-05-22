<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Hello World!';
});

Route::post('/user/create',[UserController::class,'create'])->name('user.create');

Route::post('/response',[UserController::class,'response'])->name('user.response');

Route::post('/upload',[UserController::class,'upload'])->name('user.upload');

Route::post('/submit', function (Request $request) {
   return $email = $request->input('email');
    return response()->json([
        'success' => true,
        'message' => 'Form submitted successfully.'
    ]);
});