<?php

use Symfony\Component\HttpFoundation\Response;

class src_controller_hello
{

	public function __construct()
	{

	}

    /**
     * Gets the current users shopping cart
     *
     *
     * @return Response
     * @throws Exception
     */
    public function indexAction($name)
    {

    	return new Response(json_encode(array('status'=>200, 'name'=>$name)));

    }
}