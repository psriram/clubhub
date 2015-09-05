<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
//use Symfony\Component\HttpKernel;


$request = Request::createFromGlobals();

$routes = include __DIR__.'/routes.php';
$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$resolver = new HttpKernel\Controller\ControllerResolver();

try {
	
    //extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
    //ob_start();
    $match=$matcher->match($request->getPathInfo()), EXTR_SKIP);
	$request->attributes->add($match);
	$controller = $resolver->getController($request);
	$arguments = $resolved->getArguments($request,$controller);
	$response = call_user_func_array($controller,$arguments);
	$response->send();
    //include sprintf(__DIR__.'/src/%s.php', $_route);
 	//return $this->render('hello/index.html.php', array('name' => $name));
    //$response = new Response(ob_get_clean());

} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}
 
$response->send();