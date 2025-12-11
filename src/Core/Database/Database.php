<?php

namespace Lamda\Core\Database;
use PDO;
use PDOException;

class Database
{
    protected PDO $pdo;
    protected static ?self $instance = null;

    public function __construct(array $config = [])
    {
        $cfg = array_merge($this->loadConfig(), $config);

        $driver = $cfg['driver'] ?? 'mysql';
        $host = $cfg['host'] ?? '127.0.0.1';
        $db = $cfg['database'] ?? '';
        $charset = $cfg['charset'] ?? 'utf8mb4';

        $dsn = sprintf('%s:host=%s;dbname=%s;charset=%s', $driver, $host, $db, $charset);

        
        $defaultOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];


        $option = $cfg['options'] && is_array($cfg['options']) ? $cfg['options'] + $defaultOptions : $defaultOptions;


        try{
            $this->pdo = new PDO($dsn, $cfg['username'] ?? null, $cfg['password']?? null, $option);
        }catch(PDOException $e){
            // Jangan echo langsung di production - lempar exception
            throw $e;

        }
    }

    // Singleton helper
    public static function getInstance(array $config = []):self{
        if (static::$instance === null){
            static::$instance = new static($config);
        }
        return static::$instance;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    // Query helpers
    public function fetchOne(string $sql, array $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public function fetchAll(string $sql, array $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function execute(string $sql, array $params = []): int{
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    // Transaction helpers
    public function beginTransaction(): bool{
        return $this->pdo->beginTransaction();
    }

    public function commit():bool{
        return $this->pdo->commit();
    }
    public function rollback(): bool{
        return $this->pdo->rollback();
    }

    protected function loadConfig(): array{
        $path = defined('BASE_PATH') ? BASE_PATH . '/app/config/database.php': __DIR__ . '/../../../../app/config/database.php';

        
        if(file_exists($path)){

            $cfg = include $path;
            return is_array($cfg) ? $cfg: [];
        
        }
        return [];
    }
}