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
        echo "Message received: {$msg}\n";
        $data = json_decode($msg, true);
        
        // Jika bukan JSON (null), berarti pesan string biasa
        if ($data === null) {
            echo "Received string message (not JSON): {$msg}\n";
            $data = ['action' => 'get']; // Default action: get todos
        } else {
            echo "Decoded data: " . ($data['action'] ?? 'unknown') . "\n";
        }
        
        try {
            echo "Starting try block...\n";
            
            // Handle berbagai action dari client
            if ($data['action'] === 'add') {
                echo "Action: ADD\n";
                echo "Name: " . ($data['name'] ?? 'NO NAME') . "\n";
                
                // Validasi input
                if (empty($data['name'])) {
                    throw new Exception("Todo name cannot be empty");
                }
                
                // CREATE dulu
                echo "Attempting to create todo...\n";
                $result = Todos::create(['name' => $data['name']]);
                echo "Created todo ID: {$result}\n";
            } else {
                echo "Action is: " . ($data['action'] ?? 'null') . " (not 'add')\n";
            }
            
            // SETELAH create (atau get), ambil semua data terbaru
            echo "Fetching all todos...\n";
            $todos = Todos::all();
            echo "Total todos: " . count($todos) . "\n";
            
            // Broadcast ke semua clients dengan data terbaru
            foreach($this->clients as $client){
                $client->send(json_encode([
                    'status' => 'success',
                    'data' => $todos
                ]));
            }
            echo "Broadcast sent!\n";
        } catch(Exception $e) {
            echo "EXCEPTION CAUGHT: " . $e->getMessage() . "\n";
            echo "Exception file: " . $e->getFile() . " Line: " . $e->getLine() . "\n";
            foreach($this->clients as $client){
                $client->send(json_encode([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]));
            }
        }
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