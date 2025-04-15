<?php
namespace Legendarium;

/** Class Router **/

class Router {

    private $url;
    private $routes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes["GET"][] = $route;
        return $route;
    }

    public function post($path, $callable) {
        $route = new Route($path, $callable);
        $this->routes["POST"][] = $route;
        return $route;
    }

    public function run() {
        // Get the HTTP method, default to GET if not set
        $httpMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
        $httpMethod = strtoupper($httpMethod);

        if(!isset($this->routes[$httpMethod])){
            throw new \Exception('No routes defined for HTTP method: ' . $httpMethod);
        }

        foreach($this->routes[$httpMethod] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        
        // Show 404 page if no route matches
        require VIEWS . '404.php';
    }

}
