<?php

namespace Lamda\Core\Http;

use Lamda\Core\Http\Response;
use Lamda\Core\View\LamdaViewEngine;

abstract class Controller
{
    protected static ?LamdaViewEngine $viewEngine = null;

    protected function getViewEngine(): LamdaViewEngine
    {
        if(static::$viewEngine === null){
            // BASE_PATH didefinisikan di public/index.php
            $viewPath = BASE_PATH . '/resources/views';
            $cachePath = BASE_PATH . '/storage/cache/views';

            static::$viewEngine = new LamdaViewEngine($viewPath, $cachePath);
        }

        return static::$viewEngine;
    }

    protected function view(string $view, array $rawsData = []):string{

        return $this->getViewEngine()->render($view, $rawsData);
    }
    protected function redirect(string $url, int $status = 302): Response
    {
        return Response::make('', $status, ['Location' => $url]);
    }

    
}