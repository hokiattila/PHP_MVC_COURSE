<?php
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    require "src/router.php";
    $router = new Router;
    $router->add("/home/index", ["controller" => "home", "action" => "index"]);
    $router->add("/products", ["controller"=>"product", "action" => "index"]);
    $router->add("/", ["controller" => "home", "action" => "index"]);

   $params = $router->match($path);

   $action = $params["action"];
   $controller = $params["controller"];
    require "src/controllers/$controller.php";

    // Doesn't matter that the name is in lower case
    $controller_object = new $controller;

    // Call function with the same name
    $controller_object->$action();

