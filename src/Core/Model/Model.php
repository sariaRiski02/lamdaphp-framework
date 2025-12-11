<?php


namespace Lamda\Core\Model;

use Lamda\Core\Database\Database;

class Model
{
    protected $conn;
    protected static ?self $instance = null;
    protected static string $table;
    public function __construct()
    {
        $this->conn = Database::getInstance();
    }
    public static function getInstance(){
        if(static::$instance === null){
            static::$instance = new static();
        }
        return static::$instance;
    }

    public static function get(){
        $table = static::$table;
        $db = Database::getInstance();
        $result = $db->fetchAll("SELECT * FROM $table");
        var_dump($result);
    }
    
}