<?php
 

 
use Symfony\Component\Routing;
 
$routes = new Routing\RouteCollection();
$routes->add('base', new Routing\Route('/'));
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));
 
return $routes;