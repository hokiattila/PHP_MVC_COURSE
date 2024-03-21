<?php
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    $segments = explode("/", $path);

    $action = $segments[2];
    $controller = $segments[1];
    require "src/controllers/$controller.php";

    // Doesn't matter that the name is in lower case
    $controller_object = new $controller;

    // Call function with the same name
    $controller_object->$action();

