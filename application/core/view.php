<?php

/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 22.05.17
 * Time: 22:58
 */





class View
{

    function Generate($contentView, $templateView, $data)
    {
        if(is_array($data))
        {
            extract($data);
        }
        include 'application/views/'.$templateView;
    }


}