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

    public static function query(string $query, array $params = []){
        $db = Database::getInstance();
        $result = $db->fetchAll($query, $params);
        return $result;
    }

    public static function get(string $query){
        $db = Database::getInstance();
        $result = $db->fetchAll($query);
        return $result;
    }

    public static function all(){
        $table = static::$table;
        $db = Database::getInstance();
        $result = $db->fetchAll("SELECT * FROM $table");
        return $result;
    }

    public static function find($id){
        $table = static::$table;
        $db = Database::getInstance();
        $result = $db->fetchOne("SELECT * FROM $table WHERE id = ?", [$id]);
        return $result;
    }

    public static function where($column, $operator = '=' ,$value = null){
        $table = static::$table;
        $db = Database::getInstance();
        $result = $db->fetchAll("SELECT * FROM $table WHERE $column $operator ? ", [$value]);
        return $result;
    }

    public static function create($data){
        $table = static::$table;
        $db = Database::getInstance();
        $columns = implode(", ", array_keys($data));
        $placeholders = rtrim(str_repeat("?, ", count($data)), ", ");
        $values = array_values($data);
        $db->execute("INSERT INTO $table ($columns) VALUES ($placeholders)", $values);
        return $db->lastInsertId();
    }

    public static function update($id, $data){
        $table = static::$table;
        $db = Database::getInstance();
        $setClause = implode(", ", array_map(fn($col) => "$col = ?", array_keys($data)));
        $values = array_values($data);
        $values[] = $id;
        $db->execute("UPDATE $table SET $setClause WHERE id = ?", $values);
    }


    public static function delete($id){
        $table = static::$table;
        $db = Database::getInstance();
        $db->execute("DELETE FROM $table WHERE id = ?", [$id]);
    }

    public static function latest(int $count = 10){
        $table = static::$table;
        $db = Database::getInstance();
        return $db->fetchAll("SELECT * FROM $table ORDER BY id DESC LIMIT ?", [$count]);
    }

    




    
}