<?php

/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 22.05.17
 * Time: 22:58
 */
class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->model=new Model();
        $this->view = new View();

    }


}