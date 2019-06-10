<?php
/**
 * Created by PhpStorm.
 * User: Александра
 * Date: 10.06.2019
 * Time: 15:27
 */

class Request
{
    public function response()
    {
        require_once "php/appointment.php";
        $post = $_POST;
        if(!(isset($post['patient'])) || !(isset($post['date']))||!(isset($post['time']))) {
            var_dump("Данные о записи");
            var_dump($post);
            return $post;
        }
    }
}