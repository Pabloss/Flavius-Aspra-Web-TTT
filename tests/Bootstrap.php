<?php
declare(strict_types=1);

use Application\Factory\HomeControllerFactory;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\TextResponse;
use Zend\Expressive\Application;

ini_set('display_errors', 'On');

chdir(dirname(__DIR__, 1));
require 'vendor/autoload.php';
require 'config/container.php';
$factory = new \ExpressiveLogger\LoggerFactory();
$logger = $factory($container);
