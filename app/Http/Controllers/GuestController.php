<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Database\Database;
use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;

class GuestController extends Controller
{
    public function home(){
        $query = Request::query('news');
        if($query){
            // Implement search functionality if needed
            $allNews = News::query("
                SELECT
                    n.*,
                    c.name AS category_name
                FROM news AS n
                INNER JOIN categories AS c ON n.category_id = c.id
                WHERE n.title LIKE ?
            ", ['%' . $query . '%']);
        }else{
            $allNews = News::get("
                SELECT
                    n.*,
                    c.name AS category_name
                FROM news AS n
                INNER JOIN categories AS c ON n.category_id = c.id ORDER BY id DESC
            ");
        }

        $view = $this->view('component._list-news', compact('allNews'));

        $allData = [
            'allNews' => $view
        ];
        if(Request::header('realtime')){   
            return Response::json([
                'data' => $allData
            ]);
        }

        return $this->view('home',compact('allNews'));
    }

    public function news($slug){
        $db = Database::getInstance();
        $news = $db->fetchOne("
            SELECT
                n.*,
                c.name AS category_name
            FROM news AS n
            INNER JOIN categories AS c ON n.category_id = c.id
            WHERE n.slug = ?
        ", [$slug]);
        
        return $this->view('news', compact('news'));
    }


   
    
}