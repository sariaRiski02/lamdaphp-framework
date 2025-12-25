<?php

namespace App\Http\Controllers;

use App\Models\News;
use Lamda\Core\Http\Controller;

class EventController extends Controller
{
    public function newsEvents(){
        // *PENTING*: Set headers SSE
        // Ini memberitahu browser bahwa ini bukan HTML biasa

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        echo "data: test\n\n";
        flush();
        
    }
}