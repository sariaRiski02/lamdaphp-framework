<?php

namespace Lamda\Core\Support\Facades;

use Lamda\Core\Routing\Router;
use RuntimeException;

class Route
{
    protected static ?Router $router = null;
    public static function setRouter(Router $router):void
    {
        self::$router = $router;
    }

    protected static function getRouter(): Router{
        if(!self::$router){
            throw new RuntimeException('Router instance not set on Route facade');
        }
        return self::$router;
    }

    public static function get(string $uri, $action){
        return self::getRouter()->get($uri, $action);
    }

    public static function post(string $uri, $action){
        return self::getRouter()->post($uri, $action);
    }

}