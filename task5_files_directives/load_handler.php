<?php
$files = $_FILES['userfile'];
//array (size=5)
//  'name' =>
//    array (size=2)
//      0 => string 'ИОРДАНИЯ.docx' (length=21)
//      1 => string 'ККТ_передача_АА.csv' (length=45)
//  'type' =>
//    array (size=2)
//      0 => string 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' (length=71)
//      1 => string 'application/vnd.ms-excel' (length=24)
//  'tmp_name' =>
//    array (size=2)
//      0 => string 'W:\userdata\temp\php6F01.tmp' (length=28)
//      1 => string 'W:\userdata\temp\php6F22.tmp' (length=28)
//  'error' =>
//    array (size=2)
//      0 => int 0
//      1 => int 0
//  'size' =>
//    array (size=2)
//      0 => int 15076
//      1 => int 1323
$types = $files['type'];
$sizes = $files['size'];
$names = $files['name'];
$tmp_names = $files['tmp_name'];
//проверка на тип application
$error = 0;
for($i = 0; $i <count($types); $i++){
    $match = explode('/', $types[$i])[0];
    if($match != 'application'){
        echo $types[$i]." Этот тип файла не может быть загружен";
        $error++;
        return $error;
    }
}
for($i = 0; $i<count($sizes); $i++){
    if($sizes[$i] > 50000){
        echo $sizes[$i]. " размер файла превышает допустимый";
        $error++;
        return $error;
    }
}
if($error > 0){
    echo "не удалось загрузить файлы";
    return;
}
//$uploads_dir = 'uploads';
for($i = 0; $i<count($tmp_names); $i++){
    $name = $names[$i];
    move_uploaded_file($tmp_names[$i], 'uploads/'.$name);
    echo "Файлы успешно загружены";
}


