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
        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);

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

    private function getControllerName(array $params) : string {
            $controller = $params["controller"];
            $controller = str_replace("-","",ucwords(strtolower($controller), "-"));
            $namespace = "App\Controllers";
            if(array_key_exists("namespace", $params)) {
                $namespace .= "\\" . $params["namespace"];
            }
            return $namespace . "\\" . $controller;
    }

    private function getActionName(array $params): string {
        $action = $params["action"];
        $action = lcfirst(str_replace("-","",ucwords(strtolower($action), "-")));
        return $action;
    }
}