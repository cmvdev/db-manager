<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 22.09.21
 * Time: 09:57
 */
abstract  class Model
{
    protected  $db;
    public  function  __construct()
    {
        $this->db = new Database();
    }

}