<?php


namespace Lamda\Core\Routing;

use Lamda\Core\Http\Request;
use Lamda\Core\Http\Response;
use Lamda\Core\Routing\Route;

class Router{
    /** @var Route[] */
    protected array $routes = [];

    public function get(string $uri, $action): Route
    {

        return $this->addRoute(['GET'], $uri, $action);
    }

    public function post(string $uri, $action): Route
    {

        return $this->addRoute(['POST'], $uri, $action);
    }

    protected function addRoute(array $method, string $uri, $action): Route
    {
        $uri = '/' . ltrim($uri, '/'); // buat uri lebih konsisten
        

        $route = new Route($method, $uri, $action);
        $this->routes[] = $route;
        return $route;
    }

    public function dispatch(Request $request)
    {
        $method = $request->method();
        $path = $request->path();

        [$route, $params] = $this->matchRoute($method, $path) ?? [null, []];
        
        if(!$route){
            $message = "404 URL: \"$path\" With Method \"$method\" Not Found";
            return Response::make($message, 404);
        }

        $action = $route->getAction();
        

        // closure /callable
        if(is_callable($action) && !is_array($action)){
            
            $result = call_user_func_array($action, $params);

            
        // string "Controller@Method"
        }elseif(is_string($action)){
            [$controllerName, $methodName] = explode('@',$action);

            $controllerClass = 'App\\Http\\Controllers\\' . $controllerName;
            
            

            if(!class_exists($controllerClass)){
                return Response::make('controller: '. $controllerClass .' not Found', 500);
            }

            $controller = new $controllerClass();
            
            if(!method_exists($controller, $methodName)){
                return Response::make("Method $methodName in $controllerName not found", 500);
            }

            $result = call_user_func_array([$controller, $methodName], $params);
        }elseif(is_array($action) && count($action) == 2){

            [$controllerClass, $methodName] = $action;
            

            if(!class_exists($controllerClass)){
                return Response::make('controller not Found', 500);
            }

            $controller = new $controllerClass();
            
            if(!method_exists($controller, $methodName)){
                return Response::make('method not Found', 500);
            }

            $result = call_user_func_array([$controller,$methodName], $params);
        }else{
            return Response::make('Invalid route action', 500);
        }

        // var_dump($result);
        // jika controller sudah mengembalikan response
        if($result instanceof Response){
            return $result;
        }
        // kalau cuma string / scalar -> bungkus jadi response
        
        

        
        return Response::make($result);

    }

    /**
     * @return array{0: Route, 1: array}|null
     */

    protected function matchRoute(string $method, string $path): ?array
    {
        foreach ($this->routes as $route){
            // cek method
            if(!in_array($method, $route->getMethods(), true)){
                continue;
            }

            $pattern = $route->getPattern();
            // konversi {param} jadi regex named group

            $regex = preg_replace('#\{([^}]+)\}#', '(?P<$1>[^/]+)', $pattern);
            $regex = '#^' . $regex . '$#';
            if(preg_match($regex, $path, $matches)){
                $params = [];

                foreach ($matches as $key => $value) {
                    if(is_string($key)){
                        $params[$key] = $value;
                    }
                }
                return [$route, $params];
            }
        }
        return null;
    }
}                           