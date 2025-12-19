<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Lamda\Core\Http\Controller;

class TodosController extends Controller
{
    public function todos(){
       
        return $this->view('todos');
    }

    public function updateTodo($id){
        $todo = Todos::find($id);
        return $this->view('updateTodo', ['todo' => $todo]);
    }

    
}