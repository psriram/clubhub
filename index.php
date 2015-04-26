<?php
//phpinfo();
//exit;
require_once __DIR__.'/api/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
//use Symfony\Component\Routing\Loader;
//use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel;

/*function __autoload($classname) {
    $filename = __DIR__."/api/src/controller/". $classname ."class.php";
    include_once($filename);
}*/
//include __DIR__.'/api/src/controller/hello.php';
$request = Request::createFromGlobals();

$routes = include __DIR__.'/api/routes.php';



$context = new Routing\RequestContext();
$context->fromRequest($request);


$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$resolver = new HttpKernel\Controller\ControllerResolver();

try {

     extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
     include sprintf(__DIR__.'/api/src/controller/%s.php', $_route);
     $match = $matcher->match($request->getPathInfo());

  	 $request->attributes->add($match);

     $controller = $resolver->getController($request);

  	 $arguments = $resolver->getArguments($request, $controller);

  	 $response = call_user_func_array($controller, $arguments);
  	 header('content-type: application/json');
  	 $response->send();
  	 die;
     //ob_start();

    //include sprintf(__DIR__.'/api/src/controller/%s.php', $_route);

    //$response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response($e, 404);
} catch (Exception $e) {
    $response = new Response($e, 500);
}

$response->send();
?>
