<?php

namespace App\Middleware;


use Lamda\Core\Http\Response;

class AfterAuthMiddleware
{
    public function handle(){
        
        if(isset($_SESSION['user'])){
            return Response::redirect('/');
        }
        
    }
}