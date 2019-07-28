<?php
/**
 * Created by PhpStorm.
 * User: Александра
 * Date: 28.07.2019
 * Time: 11:34
 */
$mysqli = new mysqli('localhost', 'root', '', 'try_ajax');
// Проверяем, удалось ли соединение
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}