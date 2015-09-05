<?php

use Symfony\Component\HttpFoundation\Response;

class controller_hello{

	public function indexAction($name){
		echo $name;
	}
}