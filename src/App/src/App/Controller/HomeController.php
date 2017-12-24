<?php
declare(strict_types=1);

namespace Application\App\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractController;
use Zend\Mvc\MvcEvent;

class HomeController extends AbstractController
{
    public function onDispatch(MvcEvent $e)
    {
        // TODO: Implement onDispatch() method.
    }

    public function indexAction(): Response
    {
        return new Response();
    }
}
