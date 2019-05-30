<?php
//Задание 1.
// Дана строка, содержащая полное имя файла
//(например, 'C:\OpenServer\testsite\www\someFile.txt').
//Написать функцию, которая сможет выделить из подобной строки имя файла без расширения
$directory = 'C:\OpenServer\testsite\www\someFile.txt';
function get_file($directory){
    $delimiter = '\\';//то есть разделить "\"
    $directory = explode($delimiter, $directory);
    var_dump($directory);
    $directory = array_pop($directory);
    $file_name = explode('.', $directory)[0];
    var_dump($file_name);
    return $file_name;
}
get_file($directory);
//Задача 2.
//Написать функцию - конвертер строки. Возможности (в зависимости от второго аргумента - флаг,
//который указывает, какую именно операцию следует выполнить):
//0) перевод всех символов в верхний регистр,
//1) перевод всех символов в нижний регистр,
//2) перевод всех символов в нижний регистр и первых символов слов в верхний регистр.`
function converter_string($string, int $flag){
    switch ($flag) {
        case 0:
            $str_new = strtoupper($string);
            break;
        case 1:
            $str_new = strtolower($string);
            break;
        case 2:
            $str_new = strtolower($string);
            $str_arr = explode(' ', $str_new);
            foreach ($str_arr as $every){
                $str_arr_new[] = $every = ucfirst($every);
            }
            $str_new = implode(' ', $str_arr_new);//из массива в строку слова через пробел
            break;
    }
    var_dump($str_new);
    return $str_new;
}
$my_str = "all mY trouBles Seemed so fAr aWay";
converter_string($my_str, 2);
//ВОПРОС эта функция работает только со строками из латинских букв

//Задача 3.
//Создать функцию по преобразованию нотаций:
//строка вида 'this_is_string' преобразуется в 'thisIsString' (CamelCase-нотация)
$my_not = 'this_is_string';
$my_not1 = 'thisIsString';
function change_notation($notation, int $flag){
    //'0' => вместо нижнего подчеркивания CamelCase
    if($flag == '0'){
        $notation = explode('_', $notation);
        foreach ($notation as $every){
            $notation_new[] = $every = ucfirst($every);
        }
        $notation_new = implode('', $notation_new);
    }
    //'1' => заменяем CamelCase на разделитель нижнее подчеркивание
    if($flag == '1'){
        $pattern = '/((?<=\p{Ll})\p{Lu}|\p{Lu}(?=\p{Ll}))/u';
        $notation = preg_replace($pattern, ' $1', $notation);
        $notation = strtolower($notation);
        $notation_new = str_replace(' ', '_', $notation);
    }
    var_dump($notation_new);
    return $notation_new;
}
change_notation($my_not1, 1);
//Задача 4.
//Сгенерировать 5 массивов из случайных чисел. Вывести массивы и сумму их элементов на экран.
//Найти массив с максимальной суммой элементов. Вывести его на экран еще раз.
//Генерация массива и подсчет суммы - разные функции
function create_arr_rand($a, $b){
    for($i = 1; $i <= 7; $i++){
        $our_array[]=rand($a, $b);
    }
    return $our_array;
}
//создадим 5 массивов
$array1 = create_arr_rand(0, 45);
$array2 = create_arr_rand(3, 14);
$array3 = create_arr_rand(2, 4);
$array4 = create_arr_rand(-4, 7);
$array5 = create_arr_rand(26, 45);
//вывести массивы и сумму их элементов на экран
$print_sum_and_array = function ($array){
    //var_dump($array);
    $sum = array_sum($array);
    //echo 'сумма всех значений массива равна = '. $sum;
    return $sum;
};
//найти массив с максимальной суммой элементов
function max_sum_in_array($func, ...$array){
    for($i = 0; $i < count($array); $i++) {
        $compare_arr[] = $func($array[$i]);
    }
    var_dump($compare_arr);
    sort($compare_arr);
    $max_val = array_pop($compare_arr);
    var_dump($max_val);
    return $max_val;
}
max_sum_in_array($print_sum_and_array, $array1, $array2, $array3, $array4, $array5);
//Дополнительная №2
//Дан массив, состоящий из целых чисел. Выполнить сортировку массива по возрастанию суммы цифр чисел.
//Например, дан массив [13, 55, 100]. После сортировки он будет следующего вида: [100, 13, 55],
//тк сумма цифр числа 100 = 1, сумма цифр числа 13 = 4, а 55 = 10.
//На экран вывести исходный массив, массив после сортировки и сумму цифр каждого
//числа отсортированного массива.
$array = [13, 55, 100];
function sort_by_sum($array){
    var_dump('Исходный массив: ', $array);
    foreach ($array as $every){
        $every_sum[] = array_sum(str_split($every));
    }
    $arr_with_keys = array_combine($array, $every_sum);
    asort($arr_with_keys);//отсортирует сохраняя ключи ИЗМЕНИТ массив $arr_with_keys
    var_dump('Суммы цифр каждого числа массива: ', $arr_with_keys);
    $sorted_array = array_keys($arr_with_keys);
    var_dump('Отсортированный массив: ', $sorted_array);
}
sort_by_sum($array);