<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Lamda\Core\Http\Controller;

class TestController extends Controller
{
    public function test(){
       
        
        // var_dump(Todos::all());
        Todos::all();
        Todos::create(['name' => 'New Todo from Controller']);
        
        
        return $this->view('test');
    }
}