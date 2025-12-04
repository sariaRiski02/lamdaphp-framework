<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;

class HomeController extends Controller{

    public function index(){
        
        return $this->view('hello.hello',[
            'data'=>[
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                'welcome to LamdaPHP',
                
                ]
        ]);
    }

    public function hello($name){
        return "Hello $name";
    }
}

