<?php

use Zend\Expressive\Helper\ServerUrlHelper;
use Zend\Expressive\Helper\ServerUrlMiddleware;
use Zend\Expressive\Helper\ServerUrlMiddlewareFactory;
use Zend\Expressive\Helper\UrlHelper;
use Zend\Expressive\Helper\UrlHelperFactory;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\Twig\TwigEnvironmentFactory;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\Twig\TwigRendererFactory;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

// Load configuration
$config = require __DIR__.'/config.php';

// Build container
$container = new ServiceManager();
(new Config($config))->configureServiceManager($container);

// Inject config
$container->setService('config', $config);
$factory = new TwigEnvironmentFactory();
$container->setFactory(UrlHelper::class, UrlHelperFactory::class);
$container->setInvokableClass(ServerUrlHelper::class, ServerUrlHelper::class);
$container->setInvokableClass(
    Zend\Expressive\Router\RouterInterface::class,
    Zend\Expressive\Router\ZendRouter::class
);
$container->setFactory(ServerUrlMiddleware::class, ServerUrlMiddlewareFactory::class);

$container->setService('Twig_Environment', $factory($container));

$container->setFactory(TwigRenderer::class, TwigRendererFactory::class);
$container->setFactory(TemplateRendererInterface::class, TwigRendererFactory::class);

return $container;