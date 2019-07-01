<?php
namespace Plugin\FastOrder\Controllers;

use Plugin\FastOrder\Core\Controller;
//use Plugin\FastOrder\Models\PictureRepository;

class IndexController extends Controller
{
    public function indexAction(){
        $content='fast_order_button.php';
        $template='template.php';
        $data=[
            'title'=>'Fast_order Plugin'
        ];
        //вывели страничку $page
        echo $this->renderPage($content,$template,$data);
    }

}

