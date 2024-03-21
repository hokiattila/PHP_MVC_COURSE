<?php
class Product {
    public function index() : void
    {
        require "src/models/products.php";
        $model = new Products;
        $products = $model->getData();
        require "views/products_index.php";
    }
    public function show() : void
    {
        require "views/products_show.php";
    }


}