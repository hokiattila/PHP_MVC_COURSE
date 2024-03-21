<?php
    require "model.php";
    $model = new Model;
    $products = $model->getData();
?>
<!DOCTYPE>
<html lang="en">
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
