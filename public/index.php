<?php

use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;
use Lamda\Core\Routing\Router;
use Lamda\Support\Facades\Route;

require __DIR__ . '/../vendor/autoload.php';

// 1. Buat Request
$request = Request::capture();

// 2. Buat Router
$router = new Router();

// 3. Pasang router ke Facade
// hubungkan facade ke isntance router sebelum memuat routes
Route::setRouter($router);

// 4. muat definisi route
require __DIR__ . '/../routes/web.php';


// 5. Dispatch request
$response = $router->dispatch($request);




// 6. Krim ke browser
$response->send();




