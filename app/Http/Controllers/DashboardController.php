<?php

namespace App\Http\Controllers;

use Lamda\Core\Http\Controller;

class DashboardController extends Controller
{
    public function landingPage(){
        return $this->view('dashboard.landing');
    }

    public function addNewsPage(){
        
        return $this->view('dashboard.addNews');
    }

    public function updateNewsPage(){
        return $this->view('dashboard.updateNews');
    }
    
    public function listNewsPage(){
        return $this->view('dashboard.listNews');
    }
    
    public function setCategoryPage(){
        return $this->view('dashboard.setCategory');
    }

    public function updateCategoryPage(){
        return $this->view('dashboard.updateCategory');
    }
    

}