<?php
    $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306"; // the default port is 3306 if we don't specify
    $pdo = new PDO($dsn, "product_db_user", "secret", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $stmt =  $pdo->query("SELECT * FROM product");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE>
<html>
<head>
        <title>Products</title>
        <meta charset="utf-8">
</head>
<body>
    <h1>Products</h1>
    <?php foreach ($products as $product):?>
    <h2><?= htmlspecialchars($product["name"])  /* escaping special chars */ ?></h2>
    <p><?= htmlspecialchars($product["description"]) ?></p>
    <?php endforeach; ?>
</body>
</html>
