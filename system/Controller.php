<?php
namespace system;

/**
 * Created by PhpStorm.
 * User: Marvin
 * Date: 21.09.21
 * Time: 14:52
 */
abstract class  Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
}