<?php

use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;

class AuthMiddleware{
    public function handle(){
        $headerLogin = Request::header('login');
        var_dump($headerLogin);
        exit;
    }
}