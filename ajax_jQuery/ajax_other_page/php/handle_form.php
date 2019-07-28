<?php
include_once 'db.php';
$product = trim($_POST['product']);
$quantity = intval($_POST['quantity']);

if( $product && $quantity) {
    $mysqli->query("INSERT INTO `products_order` VALUES (NULL, '$product', '$quantity' )");

    //извлекаем последнюю запись из таблицы products_order
    $query = $mysqli->query("SELECT * FROM `products_order` WHERE id=LAST_INSERT_ID();");
    $row = $query->fetch_assoc();
        $order['id'] = $row['id'];
        $order['product'] = $row['product'];
        $order['quantity'] = $row['quantity'];

    $message = "Данные из БД получены";
}else{
    $message = 'Данные НЕ удалось получить';
}
/*возвращаем ответ скрипту*/
/*формируем result - $out*/
$out = array(
    'message' => $message,
    'order' => $order
);
/*устанавливаем заголовок в формате json*/
header('Content-Type: text/json; charset=utf-8');
//отправляем result
echo json_encode($out);