<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;
use Lamda\Core\Database\Database;

class HomeController extends Controller{

    public function index(){
        
        $db = Database::getInstance();
        $stmt = $db->getPdo()
            ->prepare("SELECT * FROM todos");
        $stmt->execute();
        $todos = $stmt->fetchAll();

        return $this->view('todo', ['todos' => $todos]);
    }

    public function store(){
        $db = Database::getInstance();
        $stmt = $db->getPdo()
            ->prepare("INSERT INTO todos (name) VALUES (:name)");
        $stmt->execute([
            'name' => $_POST['todo'] ?? ''
        ]);

        return "Todo added";
    }

    public function delete($id){
        $db = Database::getInstance();
        $stmt = $db->getPdo()
            ->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);

        return "Todo deleted!";
    }

    public function updatePage($id){
        
        $db = Database::getInstance();
        $data = $db->fetchOne("SELECT * FROM todos WHERE id=:id", [
            'id' => $id,
        ]);
        return $this->view('update', compact('data'));
    }

    public function update($id){
        $dataUpdate = $_POST['todo'];
        $db = Database::getInstance();
        $stmt = $db->getPdo()->prepare("UPDATE todos SET name = :name WHERE id = :id");
        $stmt->execute([
            'name' => $dataUpdate,
            'id' => $id
        ]);
    }
}

