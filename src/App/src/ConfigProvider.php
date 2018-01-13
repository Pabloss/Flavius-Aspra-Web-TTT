<?php

namespace Application;

use Application\App\Controller\HomeController;
use Zend\Expressive\Twig\TwigEnvironmentFactory;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\Expressive\Twig\TwigRendererFactory;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * The configuration provider for the Application\App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [

            'invokables' => [
                'Application\App/Controller/Home' => HomeController::class,
                \Application\App\Service\PingService::class => \Application\App\Service\PingService::class,
            ],
            'factories' => [
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                '__main__' => [__DIR__ . '/../templates/'],
                'app' => [__DIR__ . '/../templates/app'],
                'error' => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
            ],
            'twig' => [
                'cache_dir' => dirname(__DIR__, 2) .  '/cache/templates',
                'assets_url' => '/',
                'assets_version' => '0.1',
                'extensions' => [
                    // extension service names or instances
                ],
                'globals' => [
                    // Global variables passed to twig templates
                    'ga_tracking' => 'UA-XXXXX-X'
                ],
            ],
        ];
    }
}
