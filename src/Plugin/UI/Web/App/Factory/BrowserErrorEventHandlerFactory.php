<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Event\Handler\BrowserErrorEventHandler;
use Interop\Container\ContainerInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\LazyListener;

class BrowserErrorEventHandlerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $events = new EventManager();
        $events->setIdentifiers([
            BrowserErrorEventHandler::class
        ]);

        $lazyListener = new LazyListener([
            'listener' => BrowserErrorEventHandler::class,
            'method' => 'onErrorHandled'
        ], $container);

        $events->attach('error_handled', $lazyListener);
        return new BrowserErrorEventHandler($events);
    }
}
