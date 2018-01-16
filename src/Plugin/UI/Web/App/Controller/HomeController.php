<?php
declare(strict_types=1);

namespace Application\Controller;

use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Mvc\Controller\AbstractController;
use Zend\Mvc\MvcEvent;

class HomeController extends AbstractController
{
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }


    public function onDispatch(MvcEvent $e)
    {
        // TODO: Implement onDispatch() method.
    }

    public function indexAction(): HtmlResponse
    {
        return new HtmlResponse(
            $this->renderer->render('app::index.html.twig')
        );
    }
}
