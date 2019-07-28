<?php
/**
 * Created by PhpStorm.
 * User: Александра
 * Date: 28.07.2019
 * Time: 11:31
 */
include_once 'db.php';

//извлекаем все записи из таблицы User
    $query = $mysqli->query("SELECT * FROM `products_order` ORDER BY `id` DESC;");
    $orders = [];
    while ($row = $query->fetch_assoc()) {
        $one_order = $row;//потому что fetch_assoc() - только текстовые индексы
        array_push($orders, $row);
    }
   var_dump($orders);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order list</title>
</head>
<body>
<h3><a href="../index.php">Вернуться к оформлению заказа</a></h3>
<h2>Список заказов</h2>
<table class="orders">
    <tr>
        <th>id заказа</th>
        <th>Название товара</th>
        <th>Количество</th>
    </tr>
    <?php foreach ($orders as $key=>$one_order): ?>
        <tr>
            <td><?php echo $one_order['id']; ?></td>
            <td><?php echo $one_order['product']; ?></td>
            <td><?php echo $one_order['quantity']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
