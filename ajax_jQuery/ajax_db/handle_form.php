<?php
$mysqli = new mysqli('localhost', 'root', '', 'try_ajax');
// Проверяем, удалось ли соединение
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$age = intval($_POST['age']);

if( $name && $surname && $age) {
    $mysqli->query("INSERT INTO `user` VALUES (NULL, '$name', '$surname', '$age' )");

    //извлекаем все записи из таблицы User
    $query = $mysqli->query("SELECT * FROM `user` ORDER BY `id` DESC");

    while ($row = $query->fetch_assoc()) {
        $users['id'][] = $row['id'];
        $users['name'][] = $row['name'];
        $users['surname'][] = $row['surname'];
        $users['age'][] = $row['age'];
    }
    $message = "Данные из БД получены";
}else{
    $message = 'Данные НЕ удалось получить';
}
/*возвращаем ответ скрипту*/
/*формируем result - $out*/
$out = array(
    'message' => $message,
    'users' => $users
);
/*устанавливаем заголовок в формате json*/
header('Content-Type: text/json; charset=utf-8');
//отправляем result
echo json_encode($out);

