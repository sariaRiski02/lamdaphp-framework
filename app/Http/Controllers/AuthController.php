<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;

class AuthController extends Controller
{

    public function register(){
        return $this->view('register');
    }

    public function store(){
        $input = Request::input();

        var_dump($input);
        exit;
    }

    public function login(){
        return $this->view('login');
    }

    public function update(){

    }
}