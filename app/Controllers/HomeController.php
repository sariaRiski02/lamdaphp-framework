<?php

namespace App\Controllers;


class HomeController{

    public function index(){
        return "Hello world";
    }

    public function hello($name){
        return "Hello $name";
    }
}

