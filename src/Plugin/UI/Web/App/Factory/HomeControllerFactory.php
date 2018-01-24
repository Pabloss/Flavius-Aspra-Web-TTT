<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\HomeController;
use Application\Event\Handler\BrowserErrorEventHandler;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\ServiceManager\Factory\FactoryInterface;

class HomeControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new HomeController(
            $container->get(TwigRenderer::class),
            $container->get(BrowserErrorEventHandler::class)
        );
    }
}
