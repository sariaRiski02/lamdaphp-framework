<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Controller;

class EventController extends Controller
{
    public function _news(){
        // *PENTING*: Set headers SSE
        // Ini memberitahu browser bahwa ini bukan HTML biasa
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');



        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        if(ob_get_level()) ob_end_clean();

        set_time_limit(0);




        
        while(true){

            if(connection_aborted()){
                break;
            }

            $allNews = News::get("
                SELECT
                    n.*,
                    c.name AS category_name
                FROM news AS n
                INNER JOIN categories AS c ON n.category_id = c.id ORDER BY id DESC
            ");

            $html = $this->view('component._news', compact('allNews'));
            $cleanHTML = str_replace(array("\n", "\r"), '', $html);

            // $component = $this->view('component._news', compact('allNews')) . "\n\n";
            // echo "data: $component\n\n";
            echo "event: update\n";
            echo "data: $cleanHTML\n\n";
            flush();
            sleep(3);
        }
        
    }
}