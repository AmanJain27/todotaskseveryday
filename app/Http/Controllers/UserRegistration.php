<?php

namespace App\Http\Controllers;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

use App\User;

class UserRegistration extends Controller
{
    //


    public function register(Request $request){
      // echo $request;
      $email = $request->input('email');
      $password = $request->input('password');
      $name = $request->input('name');

      $email_exists = DB::select('SELECT COUNT(email) from users where email = ?', [$email]);

      $decode_json = json_decode(json_encode($email_exists[0]), true);

      if($decode_json['COUNT(email)'] == 0){
        // perform the whole registration process here.
        //DB::insert('INSERT INTO users (name, email, password) values (?, ?, ?)', [$name, $email, $password]);


        $user = User::create(request(['name', 'email', 'password']));

        Auth::login($user);
        event(new Registered($user));
        return json_encode($email_exists[0]);


      }else

      return json_encode($email_exists[0]);


    }






}
