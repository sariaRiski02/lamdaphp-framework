<?php

namespace Lamda\Core\SSE;

use Lamda\Core\SSE\EventQueue;

class EventController{
    public function stream(){
        
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        

        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        session_write_close();

        if(ob_get_level()) ob_end_clean();
        set_time_limit(0);

        while(!connection_aborted()){
            $events = EventQueue::pull();
            foreach($events as $event){
                echo "event: {$event['type']}\n";
                echo 'data: ' . json_encode($event['payload']) . "\n\n";
                
            }
            flush();
            usleep(500000); // 0.5 detik
        }
    
    }
}