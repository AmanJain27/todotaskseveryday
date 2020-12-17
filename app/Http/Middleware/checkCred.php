<?php

namespace App\Http\Middleware;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

use Closure;

class checkCred extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     use AuthenticatesUsers;

    public function handle(Request $request, Closure $next)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        // if($email == "" or $password == ""){
        //   return redirect('/');
        // }
        // echo $req['email'];

        // maybe execute some database queries to validate the user

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);





        if(Auth::attempt(["email" => $email, "password" => $password])){

          return response()->json(["redirect" => "http://127.0.0.1:8000/"]);
        }

        else{
          $json_res =  response()->json(['user' => $email, 'authenicated' => '0', 'message' => 'Either email or password is incorrect']);
          //return auth_status[0];
          return $json_res;
          // echo $original;

        }



        //return $next($request);
    }
}
