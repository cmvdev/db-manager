<?php
namespace system;
/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 22.09.21
 * Time: 10:49
 */


class Autoloader
{
   private function  __construct()
   {
       spl_autoload_register([$this, 'loadModel']);
   }

    public  static  function  register(){
        new  Autoloader();
    }

    private  function  loadModel($className) {
        if(file_exists('../models/'.$className.'.php')) {
            require_once '../models/' . $className . '.php';
        }
            else {
                throw new \Exception("Model $className nicht gefunden");
            }
        }

}