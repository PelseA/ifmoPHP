<?php
//https://expange.ru/e/%D0%9A%D0%B0%D0%BA_%D1%81%D0%BE%D0%B7%D0%B4%D0%B0%D1%82%D1%8C_%D1%84%D0%B0%D0%B9%D0%BB_(PHP)
//проверяю на этой ссылке-->   https://hello-site.ru/share/sozdanie-csv-fajla-na-php-fput/
//и на этой-->    https://www.php.net/manual/en/function.explode.php
$post = $_POST;
$link = $post['link'];

//обработка полученной длинной ссылки $link
function create_short_link($link){
    $long_link = rawurldecode($link);//если encode
    //уберем 'https://'
    $exp_link = (explode('//', $link))[1];
    //оставим название сайта (то,что после 'https://')
    $site_name = (explode('/', $exp_link))[0];
    //захешируем ссылку crc32() - сократит количество символов
    $link = crc32($link);
    //приклеим хэш к имени сайта
    $short_link = $site_name .'/'. $link;
    return [$long_link, $short_link];
}
//запишем ссылки в файл и время создания
function add_links($long_link, $short_link){
    //время создания
    $time_create = date('H:m:s');
    $data = $long_link . ';' . $short_link .';'. $time_create . "\n";
    file_put_contents('link.csv', $data, FILE_APPEND | LOCK_EX);
    return true;
}
//проверим, есть ли в файле эти ссылки
function match_link($link){
    //получим строки из файла
    $arr_links = file('link.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    for($i = 0; $i < count($arr_links); $i++){
        $long_l = explode(';', $arr_links[$i])[0];
        if($long_l == rawurldecode($link)){
            //такая ссылка есть->отдаем короткую ссылку
            $short_l = explode(';',$arr_links[$i])[1];
            $mess = 'уже была сгенерирована '. $short_l;
            return $mess;
        }else{
            //то запишем их в файл
            $long_link = create_short_link($link)[0];
            $short_link = create_short_link($link)[1];
            if(add_links($long_link, $short_link)) {
                $mess = 'только что сгенерирована ' . $short_link;
                return $mess;
            }
        }
    }
}

$mess = match_link($link);
echo $mess;

//перегенерируем короткую ссылку, если прошло больше 5 минут
function explode_time($time){
    $time = explode(':', $time);
    return $time;
}

function regenerate_link($file){
    $all_links = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    for($i = 0; $i < count($all_links); $i++){
        $time = explode_time(explode(';', $all_links)[2]);
        $time_now = explode_time(date('H:m:s'));
        if($time[0] !== $time_now[0] || $time[1]+5 > $time_now[1]){
            //перегенерируем ссылку
            $short_link = explode(';', $all_links[$i])[1];
            $site_name = explode('/', $short_link)[0];
            $new_hash = crc32($short_link);
            $short_link = $site_name.'/'.$new_hash;
            //составим новую строку для записи
            $long_link =  explode(';', $all_links[$i])[0];
            $time_create = date('H:m:s');
            $data = $long_link . ';' . $short_link .';'. $time_create . "\n";
            //заменим на новую строку
            $all_links[$i] = $data;
            //и перезапишем файл
            file_put_contents($file, $all_links);
        }
    }
}
$file = 'link.csv';
//regenerate_link($file);



