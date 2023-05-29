<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRegistration;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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
   $email = $request->input('email');
   if(!empty($email)){

       return response()->json([
           'success' => true,
           'message' => 'Form submitted successfully.'
       ]);
   }else{
        return response()->json([
            'success' => false,
            'message' => 'Email is Required.'
        ]);
   }
});
// Assigment Mudule 15 Start 
//Task 1: Request Validation
Route::post('/register',[UserRegistration::class,'register']);

//Task 2: Request Redirect
Route::get('/dashboard', function () {
    return response()->json([
        'This is Dashbord Route'
    ]);
});
Route::get('/home', function () {
    return redirect('/dashboard', 302);
});

//Task 4: Route Middleware
Route::middleware(['auth_middleware'])->group(function () {
    Route::get('/profile', function () {
        return response()->json([
            'This is Profile Route'
        ]);
    });

    Route::get('/settings', function () {
        return response()->json([
            'This is Settings Route'
        ]);
    });
});
//Task 5: Controller
Route::resource('/product',ProductController::class);

//Task 6: Controller
Route::post('/contact',ContactController::class);

//Task 7: Resource Controller
Route::resource('/product',ProductController::class);