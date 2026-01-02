<?php

use Lamda\Core\Http\Request;
use Lamda\Core\Routing\Router;
use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;


define('BASE_PATH', dirname(__DIR__));


require __DIR__ . '/../vendor/autoload.php';




// 1. Buat Request
$request = Request::capture();

// 2. Buat Router
$router = new Router();

// 3. Pasang router ke Facade
Route::setRouter($router);

// Realtime routes
Route::get('/events', [EventController::class, 'stream']);

// 4. Muat definisi route
require __DIR__ . '/../routes/web.php';

// 5. Dispatch request
$response = $router->dispatch($request);


// 6. Kirim ke browser
$response->send();
