<?php

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Lamda\Core\WebSocket\ChatHandler;

$projectRoot = realpath(__DIR__ . '/../../../');
require $projectRoot . '/vendor/autoload.php';


$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatHandler()
        )
        ), 8080
    );

echo "WebSocket Server running on ws://localhost:8080\n";
$server->run();