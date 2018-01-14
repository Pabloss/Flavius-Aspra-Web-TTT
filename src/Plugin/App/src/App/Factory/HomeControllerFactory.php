<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\HomeController;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Twig\TwigRenderer;
use Zend\ServiceManager\Factory\FactoryInterface;

class HomeControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $renderer = $container->get(TwigRenderer::class);
        return new HomeController($renderer);
    }
}
