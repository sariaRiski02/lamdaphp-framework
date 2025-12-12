<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Users;
use App\Models\Category;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;

class GuestController extends Controller
{
    public function home(){
        if(Request::InputGet('search')!==null){
            $input = Request::InputGet('search');
            $data = News::where('title', 'like', "%$input%");
            
        }else{
            $data = News::all();
        }
        return $this->view('home', compact('data'));
    }

    public function detail($id){
        $news = News::find($id);
        $category = Category::find($id);
        $user = Users::find($id);
        $newsRelated = News::latest(3);
        return $this->view('detail', compact('news','category','user','newsRelated'));
    }

    public function search(){
        
        
    }

    
}