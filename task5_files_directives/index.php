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



