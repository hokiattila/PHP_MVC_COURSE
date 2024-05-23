<?php

namespace Framework;
use ReflectionMethod;

class Dispatcher {
    public function __construct(private Router $router) // Constructor property promotion => same as $this->router = $router; Works because of the access modifier
    {
    }

    public function handle(string $path) : void {
        $params = $this->router->match($path);
        if($params === false) exit("No route matched");
        $action = $params["action"];
        $controller = "App\Controllers\\".ucwords($params["controller"]);

        // Doesn't matter that the name is in lower case
        $controller_object = new $controller;

        $args = $this->getActionArguments($controller, $action, $params);

        // Call function with the same name
        $controller_object->$action(...$args); // unpacking array arguments using the splat operator
    }

    private function getActionArguments(string $controller, string $action, array $params) : array {
        $args = [];
        $method = new ReflectionMethod($controller, $action);
        foreach($method->getParameters() as $parameter) {
            $name = $parameter->getName();
            $args[$name] = $params[$name];
        }
        return $args;
    }


}