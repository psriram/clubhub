<?php
use Symfony\Component\Routing;

/*$routes = new Routing\RouteCollection();
$routes->add('base', new Routing\Route('/'));
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;

use Symfony\Component\Routing;*/

$routes = new Routing\RouteCollection();
//$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
//$routes->add('bye', new Routing\Route('/bye'));
//$routes->add('base', new Routing\Route('/'));
$routes->add('hello', new Routing\Route(
    '/hello/{name}',
    array('_controller' => 'src_controller_hello::indexAction'),
    array(
        'name' => 'world',
    ),//requirements
    array(), //options
    '', //host
    array(), //schema
    array('GET') // methods
));

//print_r($routes);
//exit;
return $routes;