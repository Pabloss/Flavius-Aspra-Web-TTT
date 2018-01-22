<?php
declare(strict_types=1);


use Application\Factory\HomeControllerFactory;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\TextResponse;
use Zend\Expressive\Application;

ini_set('display_errors', 'On');

chdir(dirname(__DIR__, 5));
require 'vendor/autoload.php';
require 'config/container.php';

$container->setFactory('HelloWorld', function ($container) {
    return function ($request, DelegateInterface $delegate) {
        return new TextResponse('Hello, world!');
    };
});

$container->setFactory('Ping', function ($container) {
    return function ($request, DelegateInterface $delegate) {
        return new JsonResponse(['ack' => time()]);
    };
});
$container->setFactory('Controller', function ($container) {
    return function (ServerRequestInterface $request, DelegateInterface $delegate) use ($container) {
        $controllerFactory = new HomeControllerFactory();
        $controller = $controllerFactory($container, "Controller");

        $uri = $request->getUri();
        $path = $uri->getPath();
        if (strpos('error', $path)){
            return $controller->errorAction();
        }
        return $controller->indexAction();
    };
});
$factory = new \ExpressiveLogger\LoggerFactory();
$logger = $factory($container);
//$app = AppFactory::create($container);
$app = $container->get(Application::class);
$app->get('/', 'HelloWorld');
$app->get('/ping', 'Ping');
$app->get('/controller', 'Controller');

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();

$app->run();
