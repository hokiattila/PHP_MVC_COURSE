<?php

class Model {
    public function getData(): array {
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306"; // the default port is 3306 if we don't specify
        $pdo = new PDO($dsn, "product_db_user", "secret", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt =  $pdo->query("SELECT * FROM product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}