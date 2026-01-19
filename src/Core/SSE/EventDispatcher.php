<?php

namespace Lamda\Core\SSE;

class EventDispatcher
{
    public static function dispatch(array $payload = []): void
    {

        EventQueue::push([
            'type' => 'update',
            'payload' => $payload,
            'id_event_time' => time()
        ]);
    }
}
