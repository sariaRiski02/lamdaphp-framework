<?php

namespace Lamda\Core\Routing;

class Route{

    protected array $methods;
    protected string $pattern;
    protected $action; // string | arrray | callable
    protected $middleware = null;

    public function __construct(array $methods, string $pattern, $action, $middleware){
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->action = $action;
        $this->middleware = $middleware;
    }

    public function getMethods(): array{
        return $this->methods;
    }

    
    public function getPattern(): string{
        return $this->pattern;
    }

    public function getAction(){
        return $this->action;
    }

    public function getMiddleware(){
        return $this->middleware;
    }
}