<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Lamda\Core\Database\Database;
use Lamda\Core\Http\Controller;

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
        return $this->view('dashboard.listNews');
    }

    public function addNewsPage(){
        return $this->view('dashboard.addNews');
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
        return $this->view('dashboard.setCategory');
    }

    public function updateCategoryPage(){
        return $this->view('dashboard.updateCategory');
    }

}