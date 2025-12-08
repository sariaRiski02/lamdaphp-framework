<?php

namespace Lamda\Core\Http;

class Request
{
    protected string $method;
    protected string $path;

    public function __construct(string $method, string $path)
    {
        $this->method = strtoupper($method);
        $this->path = '/' . ltrim($path, '/');
    }

    public static function capture(): self{
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        // remove query string
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

        return new self($method, $path);
    }

    public function method(): string{
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }
}