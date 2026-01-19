<?php

namespace Lamda\Core\Middleware;

use Lamda\Core\Http\Response;
use Lamda\Core\Middleware\AbstractMiddleware;

class AuthMiddleware extends AbstractMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            return Response::redirect('/login');
        }
    }
}