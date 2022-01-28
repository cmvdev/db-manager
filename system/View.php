<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 21.09.21
 * Time: 15:05
 */
class View
{

    public  function  render($view) {
        if(file_exists('../views/'.$view.'.php')) {
            require '../views/'.$view.'.php';
        }
        else {
            throw new Exception ('View '.$view . ' existiert nicht');
        }
    }
}