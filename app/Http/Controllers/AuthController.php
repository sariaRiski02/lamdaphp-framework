<?php

namespace App\Http\Controllers;

use App\Models\User;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;
use Lamda\Core\Http\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->view('login');
    }   
    public function register()
    {
        return $this->view('register');
    }

    public function store(){
        $input = Request::input();

        foreach($input as $key => $value){
            if(empty($value)){
                // Handle empty fields
                return $this->view('register', 
                    [
                        'error' => 'Semua bidang harus diisi. Silakan coba lagi.'
                    ]);
            }
        }

        if($input['password'] !== $input['confirm_password']){
            // Handle password mismatch
            return $this->view('register', ['error' => 'Password tidak sesuai. Silakan coba lagi.']);
        }
        unset($input['confirm_password']);
        $input['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
        User::create($input);
        return Response::redirect('/login');
    }


    public function loginPost()
    {
        $input = Request::input();
        if($input['email'] === '' || $input['password'] === ''){
            return $this->view('login', ['error' => 'Email dan Password harus diisi. Silakan coba lagi.']);
        }
        $user = User::where('email', value: $input['email']);
        
        if(empty($user)){
            return $this->view('login', ['error' => 'Email tidak ditemukan. Silakan Daftar.']);
        }
        $user = $user[0];
        if($user['email'] !== $input['email'] || !password_verify($input['password'], $user['password'])){
            return $this->view('login', ['error' => 'Password Atau Email Salah']);
        }

        session_regenerate_id(true);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'token' => bin2hex(random_bytes(10))
        ];
        
        return Response::redirect('/');

    }

    public function logout(){
        session_destroy();
        return Response::redirect('/login');
    }


}