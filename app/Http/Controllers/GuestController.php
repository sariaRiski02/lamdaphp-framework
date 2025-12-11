<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;

class GuestController extends Controller
{
    public function home(){
        
        return $this->view('home');
    }

    
}