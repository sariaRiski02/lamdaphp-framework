<?php

namespace App\Http\Middlewares;

use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;


class AuthMiddleware
{
    public function handle(){
        
        if(!isset($_SESSION['user'])){
            return Response::redirect('/login');
        }

    }
}