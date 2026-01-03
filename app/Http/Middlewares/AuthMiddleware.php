<?php

namespace App\Http\Middlewares;

use Lamda\Core\Http\Response;


class AuthMiddleware{
    public function handle(){
        $sessionUser = session_id();
        if(!$sessionUser){
            return Response::redirect('/login');
        }

        $cookieLogin = isset($_COOKIE['Xusr']) ? $_COOKIE['Xusr'] : null;

        if(!$cookieLogin){
            return Response::redirect('/login');
        }

        if(!isset($_SESSION["user_$cookieLogin"]) || $_SESSION["user_$cookieLogin"] != $sessionUser){
            return Response::redirect('/login');
        }
    }
}