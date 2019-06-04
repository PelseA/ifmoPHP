<?php

//Задание 1. Удаление каталога. Написать рекурсивную функцию удаления непустого каталога
//    написать функцию, которая будет удалять каталог и все его содержимое
//    Осуществить рекурсивный вызов в подкаталогах
//    Дано: path - путь к каталогу (каталог должен быти с подкаталогами и файлами)
$now_in = getcwd();
var_dump($now_in);
$what_inside = scandir('dir1');
var_dump('вот что: ', $what_inside);
//эту функцию используем в основной
function explode_dir($dir_name){ //delete_last_folder
    $dir_string = explode('/', $dir_name);
    var_dump('Разбивка: ', $dir_string);
    $dir_without_file = [];
    for($i = 0; $i < count($dir_string) - 1; $i++) {
        array_push($dir_without_file, $dir_string[$i]);
        var_dump('dir_without_file = ', $dir_without_file);
    }
    $for_delete = implode('/', $dir_without_file);
    var_dump($for_delete, ' нужно удалить последнюю');
    rmdir($for_delete);
    var_dump('папка удалена');
    //снова получим имя-путь и удалим последнюю передав имя в эту же функцию
    $delete_previous = [];
    for($i = 0; $i < count($dir_string) - 2; $i++) {
        array_push($delete_previous, $dir_string[$i]);
        var_dump('delete_previous = ', $delete_previous);
    }
    $delete_previous = implode('/', $delete_previous);
    var_dump('директория удалена');
    if($delete_previous != $dir_without_file[0]) {
        explode_dir($delete_previous);
    }
}
//удаление с рекурсией
function delete_catalog($dir_name){
    if(!is_dir($dir_name)) {
        var_dump('папка содержит файлы: ', $dir_name);

        //далее проверка на пустоту
        $size = filesize($dir_name);
        if(filesize($dir_name)>0){
            var_dump('файл нужно удалить');
            //проверка не открыт ли файл в данный момент
            if(!is_executable($dir_name)) {
                unlink($dir_name);
                var_dump('файл удален');
                //удаляем папки каталога
                explode_dir($dir_name);//используем нашу функ explode_dir()
            }else{
                echo "Файл открыт в другой программе. <br>
                        Закройте файл(ы) и повторите удаление. <br>";
            }
        }
    }else{
            if ($d_handle = opendir($dir_name)){
                //получим то, что внутри папки
                $arr_files = [];
                while (false !== ($file = readdir($d_handle))) {
                    //собирем в массив то, что в папке
                    array_push($arr_files, $file);
                    var_dump($arr_files);
                }
                for($i = 2; $i < count($arr_files); $i++){
                    $next_dir = $dir_name. '/' .$arr_files[$i];
                    var_dump($next_dir);
                    delete_catalog($next_dir);//применим рекурсию
                }
            }
        }
    }
delete_catalog('dir1');



