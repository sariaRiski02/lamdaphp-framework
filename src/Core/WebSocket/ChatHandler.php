<?php


namespace Lamda\Core\WebSocket;

use App\Models\Todos;
use Exception;
use Lamda\Core\Database\Database;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use SplObjectStorage;

class ChatHandler implements MessageComponentInterface{
    
    protected SplObjectStorage $clients;
    public function __construct()
    {
        $this->clients = new SplObjectStorage;
        // Initialize database connection dengan config
        $projectRoot = realpath(__DIR__ . '/../../../');
        $config = include $projectRoot . '/app/config/database.php';
        if (is_array($config)) {
            Database::getInstance($config);
        }
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! Total: {$this->clients->count()}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        
        
    }
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection closed! Total: {$this->clients->count()}\n";
    }

    public function onError(ConnectionInterface $conn, Exception $e)
    {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }



}