<?php

namespace Lamda\Core\SSE;

class EventDispatcher{
    public static function dispatch(string $type, array $payload = []):void {
        EventQueue::push([
            'type' => $type,
            'payload' => $payload,
            'id_event_time' => time()
        ]);
    }
}

