<?php
include_once('route.class.php');
class Router {

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    private function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null)
        {
            $name = $callable;
        }
        if($name)
        {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']]))
        {
            return "404";
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $value)
        {
            if($value->match($this->url))
            {
                
                return $value->called();
            }
        }
        return "404";
    }

    public function url($name, $params = [])
    {
        if(!isset($this->namedRoutes[$name]))
        {
            return "404";
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

}
?>