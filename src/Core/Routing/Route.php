<?php

namespace Lamda\Core\Routing;

class Route{

    protected array $methods;
    protected string $pattern;
    protected $action; // string | arrray | callable

    public function __construct(array $methods, string $pattern, $action){
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->action = $action;
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
}