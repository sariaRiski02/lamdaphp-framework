<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Http\Response;

class DashboardViewController extends Controller
{
    public function landingPage(){
        
        $news = News::all();
        $published = array_filter($news, function($item){
            return isset($item['status']) && $item['status'] === 'published';
        });
        
        $draft = array_filter($news, function($item){
            return isset($item['status']) && $item['status'] === 'draft';
        });

        $published = count($published);
        $draft = count($draft);

        $totalNews = count($news);
        $totalCategory = Category::count();

        $news = News::get(
            "SELECT 
                n.*,
                c.name AS category_name
            FROM 
                news AS n
            INNER JOIN 
                categories AS c ON n.category_id = c.id LIMIT 5
            "
        );

        return $this->view('dashboard.landing', compact(
            'totalNews',
            'totalCategory',
            'published',
            'draft',
            'news'
        ));
    }

    public function listNewsPage(){
        $news = News::get(
            "SELECT 
                n.*,
                c.name AS category_name
            FROM 
                news AS n
            INNER JOIN 
                categories AS c ON n.category_id = c.id ORDER BY n.id DESC
            "
        );

        return $this->view('dashboard.listNews', compact('news'));
    }

    public function addNewsPage(){

        $categories = Category::all();

        return $this->view('dashboard.addNews', compact('categories'));
    }

    public function updateNewsPage($slug){


        $news = News::where('slug', value:$slug)[0];
        $categories = Category::all();
        return $this->view('dashboard.updateNews',compact(
            'news',
            'categories',
        ));

    }
    
    
    public function setCategoryPage(){
        $categories = Category::all();
        return $this->view('dashboard.setCategory', compact('categories'));
    }

    public function updateCategoryPage($slug){
        $category = Category::where('slug', value:$slug)[0];
        
        return $this->view('dashboard.updateCategory',compact('category'));
    }

    // reactive method
    public function _news_landing(){
         $news = News::get(
            "SELECT 
                n.*,
                c.name AS category_name
            FROM 
                news AS n
            INNER JOIN 
                categories AS c ON n.category_id = c.id LIMIT 5
            "
        );
        
        $view = $this->view('component._landing-list-news', compact('news'));

        return Response::json([
            'data' => $view
        ]);
    }

}