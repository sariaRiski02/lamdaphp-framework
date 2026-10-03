<?php

namespace Lamda\Core\Http;

use Exception;

class Request
{
    protected string $method;
    protected string $path;

    public function __construct(string $method, string $path)
    {
        $this->method = strtoupper($method);
        $this->path = '/' . ltrim($path, '/');
    }

    public static function capture(): self
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        // remove query string
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';
        return new self($method, $path);
    }

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    public static function query($param = '')
    {
        if ($param == '') {
            return $_GET;
        }
        return $_GET[$param] ?? null;
    }

    public static function input($name = '')
    {
        if (self::header('Content-Type') !== 'application/json') {
            return $name == '' ? $_POST : ($_POST[$name] ?? null);
        }
        $request = json_decode(file_get_contents("php://input"), true) ?? [];
        return $name == '' ? $request : ($request[$name] ?? null);
    }

    public static function header(string $name = ''): ?string
    {

        $headers = getallheaders();
        if ($name) {
            return $headers[$name] ?? null;
        }
        return $headers;
    }

     public static function realtime(){
        return self::header('realtime') ?? self::header('Realtime');
    }
}
