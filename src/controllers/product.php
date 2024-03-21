<?php
class Product {
    public function index()
    {
        require "models/products.php";
        $model = new Products;
        $products = $model->getData();
        require "views/products_index.php";
    }
}