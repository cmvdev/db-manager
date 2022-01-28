<?php
class IndexController extends \system\Controller 
{
	public function index()
	{
		$this->view->title = 'index';
		$this->view->render('index');
	}
}
?>