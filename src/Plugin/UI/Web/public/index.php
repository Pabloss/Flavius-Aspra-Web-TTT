<?php
declare(strict_types=1);

use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\TextResponse;
use Zend\Expressive\AppFactory;

ini_set('display_errors', 'On');

chdir(
    dirname
    (dirname
        (dirname
            (dirname
                (
                    dirname(__DIR__)
                )
            )
        )
    )
);
require 'vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function ($request, DelegateInterface $delegate) {
    return new TextResponse('Hello, world!');
});

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();