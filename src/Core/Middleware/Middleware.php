<?php

namespace Lamda\Core\Middleware;

use Lamda\Core\Http\Response;

class Middleware {

    public static function name(string $name){
        return (new $name())->handle();
    }
}