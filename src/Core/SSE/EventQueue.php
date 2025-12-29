<?php

namespace Lamda\Core\SSE;

class EventQueue
{
    protected static string $file = __DIR__ . '/../../storage/events.queue';

    public static function push(array $event): void
    {
        $dir = dirname(self::$file);
        
        // Buat folder jika belum ada
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
        $line = json_encode($event) . PHP_EOL;
        file_put_contents(self::$file, $line, FILE_APPEND | LOCK_EX);
    }
    
    public static function pull(): array {
        if (!file_exists(self::$file)) {
            return [];
        }
        
        $lines = file(self::$file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        return array_filter(
            array_map(fn($l) => json_decode(trim($l), true), $lines),
            fn($item) => $item !== null
        );
    }
}