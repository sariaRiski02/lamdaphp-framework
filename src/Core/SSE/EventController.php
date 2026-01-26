<?php

namespace Lamda\Core\SSE;

use Lamda\Core\SSE\EventQueue;

class EventController
{
    public function stream()
    {

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        // Matikan kompresi agar data mengalir realtime
        ini_set('zlib.output_compression', 'Off');

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        // Header khusus untuk Nginx / Reverse Proxy agar tidak menahan data
        header('X-Accel-Buffering: no');


        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_write_close();

        if (ob_get_level()) {
            ob_end_clean();
        }
        set_time_limit(0);


        // TRIK "PADDING": Kirim spasi kosong sebanyak 2KB - 4KB di awal
        // Ini memaksa Proxy/Ngrok/Browser menganggap "oke data sudah banyak, ayo tampilkan"
        echo ":" . str_repeat(" ", 2048) . "\n\n";
        flush();

         $lastEventId = $_SERVER['HTTP_LAST_EVENT_ID'] ?? 0;

        while (true) {
            if (connection_aborted()) {
                break;
            }
            $event = end(EventQueue::pull());

            echo ": keep-alive\n\n";

            if (!empty($event) && $event['id_event_time'] != $lastEventId) {
                echo "event: {$event['type']}\n";
                echo "data: " . json_encode($event['payload']) . "\n";
                echo "id: {$event['id_event_time']}-$lastEventId\n\n";
                $lastEventId = $event['id_event_time'];
            }

            if (connection_aborted()) {
                break;
            }


            @flush();

            usleep(500000); // 0.5 detik
        }
    }
}
