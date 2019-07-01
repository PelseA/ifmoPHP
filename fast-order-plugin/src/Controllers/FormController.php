<?php
/**
 * Created by PhpStorm.
 * User: Александра
 * Date: 01.07.2019
 * Time: 17:54
 */
namespace Plugin\FastOrder\Controllers;
use Plugin\FastOrder\Core\Controller;
class FormController extends Controller
{
    public function fastorderAction()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $content = 'fast_order_form.php';
            $template = 'template.php';
            $data = [
                'title' => 'Make fast order'
            ];
            echo $this->renderPage($content, $template, $data);
        }else
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'title'=>'Регистрация'
                ];
                $post = $_POST;
                var_dump($post);
//   показать уведомление об успешной отправке
            }
    }
}