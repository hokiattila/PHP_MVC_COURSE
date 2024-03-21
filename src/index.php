<?php

    $action = $_GET["action"];
    $controller = $_GET["controller"];

    if($controller === "products") {
        require "controllers/product.php";
        $controller_object = new Product;
    } elseif ($controller === "home") {
        require "controllers/home.php";
        $controller_object = new Home;
    }

    if($action === "index") {
        $controller_object->index();
    } elseif($action === "show") {
        $controller_object->show();
    }
