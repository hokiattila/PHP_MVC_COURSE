<?php

    $action = $_GET["action"];
    $controller = $_GET["controller"];
    require "src/controllers/$controller.php";

    // Doesn't matter that the name is in lower case
    $controller_object = new $controller;

    // Call function with the same name
    $controller_object->$action();

