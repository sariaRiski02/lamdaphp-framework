<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Controller;
use Lamda\Core\Database\Database;
use Lamda\Core\Http\Request;

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
                INNER JOIN categories AS c ON n.category_id = c.id
            ");
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