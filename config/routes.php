<?php

use Application\App\Controller\HomeController;
use Application\App\Service\PingService;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\TextResponse;

$app->get('/', function ($request, DelegateInterface $delegate) {
    return new TextResponse('Hello, world!');
});
$app->get('/service', function ($request, DelegateInterface $delegate) {
    $service = new PingService();
    return $service->ping();
});

$app->get('/controller', function ($request, DelegateInterface $delegate) {
    $controller = new HomeController();
    return $controller->indexAction();
});
