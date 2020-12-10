<?php

namespace App\Http\Middleware;
use \Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpFoundation\Response;
use Closure;

class checkCred
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // if($email == "" or $password == ""){
        //   return redirect('/');
        // }
        // echo $req['email'];

        // maybe execute some database queries to validate the user

        if(!Auth::attempt(["email" => $email, "password" => $password, "active" => 1])){
          $json_res =  response()->json(['user' => $email, 'authenicated' => '0', 'message' => 'Either email or password is incorrect']);
          //return auth_status[0];
          return $json_res;
          // echo $original;
        }
        else{
          return view('user');
        }



        return $next($request);
    }
}
