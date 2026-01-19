<?php

namespace App\Models;

use Lamda\Core\Http\Response;
use Lamda\Core\Model\Model;

class AuthMiddleware
{
    public function handle(){
        
        if(!isset($_SESSION['user'])){
            return Response::redirect('/login');
        }
        
    }
}