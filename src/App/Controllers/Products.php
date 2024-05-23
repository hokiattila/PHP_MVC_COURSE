<?php

namespace App\Controllers;
use App\Models\Product;
class Products
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();
        require "views/products_index.php";
    }

    public function show(string $id): void
    {
        require "views/products_show.php";
    }

    public function showPage(string $title, string $id, string $page) {
            echo $title," ",$id," ", $page;
    }

}