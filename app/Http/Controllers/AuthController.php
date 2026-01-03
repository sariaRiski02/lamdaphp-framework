<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;

class AuthController extends Controller
{

    public function register(){
        return $this->view('register');
    }

    public function store(){
        $input = Request::input();
        if($input['password'] !== $input['password_confirm']) {
            return $this->redirect('/register');
        }

        unset($input['password_confirm']);

        foreach ($input as $key => $value) {
            if(!$value){
                return $this->redirect('/register');
            }
        }

        User::create($input);
        return $this->redirect('/login');
    }

    public function login(){
        return $this->view('login');
    }

    public function authentication(){
        
        $credential = Request::input();
        $user = User::where('email', value:$credential['email']);
        if(!$user){
            return $this->redirect('/login');
        }
        $user = $user[0];
        if($user['password'] !== $credential['password']){
            return $this->redirect('/login');
        }

        $shuffle = str_shuffle($user['name']);
        setcookie('Xusr', $shuffle);
        $_SESSION["user_$shuffle"] = $user['id'];
        return $this->redirect('/dashboard');

    }
}