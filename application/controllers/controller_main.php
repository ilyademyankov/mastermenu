<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 22.05.17
 * Time: 23:05
 */


class ControllerMain extends Controller
{

    function __construct(){
        $this->model = new ModelMain();
        $this->view = new View();
    }

    function ActionIndex()
    {
        $data=$this->model->GetMenu();
        $this->view->generate('main_view.php', 'template_view.php',"$data");
    }
}
