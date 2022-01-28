<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 21.09.21
 * Time: 14:47
 */
class Bootstrap
{
    public function __construct()
    {
        if(isset($_GET['nav'])) {
            $nav = rtrim($_GET['nav'], '/');
        } else {
            $nav ='Index';
        }

        $nav_arr = explode('/', $nav);


        $controllerFileName = '../controllers/'.ucfirst(strtolower($nav_arr[0])).'controller.php';
        $classname = $nav_arr[0]. 'Controller';

        if(file_exists($controllerFileName)) {
            require_once  $controllerFileName;
        } else {
            throw  new Exception ("controller {$nav}Controller existiert nicht");
        }


        $controller_obj = new $classname;
        if(isset($nav_arr[2])) {
            $controller_obj->{$nav_arr[1]}($nav_arr[2]);

        }
        elseif(isset($nav_arr[1])) {
            $controller_obj->{$nav_arr[1]}();
        }
        else {
            if(method_exists($controller_obj, 'index')){
                $controller_obj->index();
            }
        }

    }

}