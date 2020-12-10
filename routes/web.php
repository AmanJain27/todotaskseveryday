<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
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

Route::get('/login', function(){
	return view('login');
});



Route::post('/login/ajax', function (Request $request) {
    // return view('welcome');
    // echo "eh";
    // return redirect('login');

    //echo $request->input('email');


})->middleware('checkCred');


Route::get('/register', function(Request $request){


  return view('register');


});

Route::post('/register/ajax', function(Request $request){




})->middleware('register');
