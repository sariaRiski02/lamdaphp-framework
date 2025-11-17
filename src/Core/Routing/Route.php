<?php

namespace Lamda\Core\Routing;

class Route{
    
    protected array $method;
    protected string $pattern;
    protected $action; // string | arrray | callable

    public function __construct(array $method, string $pattern, $action){
        $this->method = $method;
        $this->pattern = $pattern;
        $this->action = $action;
    }

    public function getMethod(): array{
        return $this->method;
    }


    public function getPattern(): string{
        return $this->pattern;
    }

    public function getAction(){
        return $this->action;
    }
}