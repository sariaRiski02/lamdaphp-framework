<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return $this->view('news');
    }

    public function contact(){
        return $this->view('contact');
    }

    public function about(){
        return $this->view('about');
    }

    

}
