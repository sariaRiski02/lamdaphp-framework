<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        $component = $this->view('Components.Comp_news', compact('news'));

        if(Request::header('realtime')){
            return Response::json([
                'data' => [
                        'news' => $component
                    ]
            ]);
        }
        return $this->view('news', compact('news'));
        
    }

    public function show($slug){
        
        $newsItem = News::where('slug', value: $slug)[0];
        
        return $this->view('news_detail', compact('newsItem'));
    
    }

    public function contact(){
        return $this->view('contact');
    }

    public function about(){
        return $this->view('about');
    }
}
