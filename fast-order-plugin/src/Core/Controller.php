<?php

namespace Plugin\FastOrder\Core;


class Controller
{
    public function renderPage($content,$template,$data=[]){
        extract($data);
        //преобразует массив к виду переменна($ключ = "значение") $title='Главная';
        ob_start();
        include_once __DIR__.'/../Views/'.$template;
        //перетащили содержимое template.php
        // и все это кладется строкой в переменную $page
        $page=ob_get_contents();
        ob_end_clean();
        return $page;
    }

}