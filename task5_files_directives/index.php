<?php
//Задание 1. Удаление каталога. Написать рекурсивную функцию удаления непустого каталога
//    написать функцию, которая будет удалять каталог и все его содержимое
//    Осуществить рекурсивный вызов в подкаталогах
//    Дано: path - путь к каталогу (каталог должен быти с подкаталогами и файлами)
$path = getcwd();
$folder = 'dsds';
$path = $path . '\\' . $folder;//тут можно использовать .DIRECTORY_SEPARATOR.
var_dump($path);
function rm_dir_recursive($path){
    if(is_file($path)) return unlink($path);
    if(is_dir($path)){
        foreach(scandir($path) as $every){
            if(($every != '.') && ($every != '..')){
                rm_dir_recursive($path.DIRECTORY_SEPARATOR.$every);
            }
        }
        return rmdir($path);
    }
    return true;
}
rm_dir_recursive($path);

//Задание 3. Загрузка нескольких файлов на сервер (обязательно проверять на тип и размер)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="load_handler.php" method="post" enctype="multipart/form-data">
    <p id="error"></p>
    <p><input name="userfile[]" class="validating" type="file" multiple="multiple"></p>
    <p><input type="submit" value="загрузить файлы"></p>
</form>
<script src="js/validating.js"></script>
</body>
</html>



