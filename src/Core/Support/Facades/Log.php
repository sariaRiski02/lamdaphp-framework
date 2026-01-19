<?php

namespace Lamda\Core\Support\Facades;

class Log
{
    protected static $location = BASE_PATH . "/storage/log/lamda.log";
    protected static ?self $instance = null;


    public function getInstance()
    {
        if (self::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }


    static function write($content)
    {
        $content = $content . PHP_EOL;
        file_put_contents(self::$location, $content, FILE_APPEND);
    }
}
