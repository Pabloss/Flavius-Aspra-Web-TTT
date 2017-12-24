<?php
declare(strict_types=1);

use Zend\Expressive\AppFactory;

ini_set('display_errors', 'On');

chdir(dirname(__DIR__, 5));
require 'vendor/autoload.php';

$app = AppFactory::create();

require 'config/pipeline.php';
require 'config/routes.php';
$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();
