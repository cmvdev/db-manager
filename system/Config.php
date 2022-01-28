<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 24.09.21
 * Time: 10:42
 */
class Config
{
    private  $oonfig_arr;
    private static $instance = NULL;

    public  function  __construct()
    {
        $this->config_arr = require '../config/config.php';
    }

    public function get($key)
    {
        return $this->config_arr[$key];
    }
    private function  __clone(){

    }

    public static function getInstance()
    {
        if(self::$instance==NULL) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

}