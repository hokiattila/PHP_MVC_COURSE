<?php

namespace Framework;

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

        // Call function with the same name
        $controller_object->$action();
    }

}