<?php

namespace App\Http\Middlewares;

use Lamda\Core\Http\Response;

class AfterAuthMiddleware
{
    public function handle(){
        
        // buat logic anda disini untuk middleware untuk melindungi route
        if(isset($_SESSION['user'])){
            return Response::redirect('/');
        }
        
    }
}