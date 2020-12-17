<?php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\UserRegistration;
use Illuminate\Support\Facades\Auth;
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



//function to check wether certain route is accessed by some other route

function is_previous_route(string $routeName) : bool
{
    $previousRequest = app('request')->create(URL::previous());
    //echo $previousRequest;

    try {
        $previousRouteName = app('router')->getRoutes()->match($previousRequest)->getName();
    } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception) {
        // Exception is thrown if no mathing route found.
        // This will happen for example when comming from outside of this app.
        return false;
    }

    return $previousRouteName === $routeName;
}




Auth::routes(['verify' => true]);


Route::get('/', function () {

  if(auth()->check())
    return view('home');
  else
    return view('login');


});

Route::get('login', function(){
  return view('login');
})->name('login');




Route::post('/ajax', function (Request $request) {



})->middleware('checkCred');


Route::get('/register', function(Request $request){


  return view('register');


})->name('register');

Route::post('/register/ajax', [UserRegistration::class, 'register'])->name('registerAjax');


Route::get('/email/verify', function(Request $request){
    // $email = $request->input('email');
    // $password = $request->input('password');
    // if(auth()->check())
    //
    //   return "user exists";
    // else {
    //   return "doenst exist";
    // }
    if(is_previous_route('register'))
      return response()->json(["message" => "An email verification link has been sent to your email. Kindly click on it to complete the registration process."]);
    else
    return view('verify');

})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){


    $request->fulfill();

     return view('home');


})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('/logout', function(Request $request){
  $password = $request->input('password');
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');


})->name('logout');




Route::post('/email/reverify', function(Request $request){


  $request->user()->sendEmailVerificationNotification();

  return back()->with('message', 'Verification link sent!');



})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




Route::middleware(['auth', 'verified'])->group(function(){

// users profile route

  Route::get('/profile', function(Request $request){
    return "Hello, ". $request->user()->name;
  });


// homepage

  Route::get('/home', function(){
    return view('user');
  });






});
