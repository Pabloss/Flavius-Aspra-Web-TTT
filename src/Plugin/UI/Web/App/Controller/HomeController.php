<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Event\Handler\BrowserErrorEventHandler;
use ExpressiveLogger\LoggerFacade;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Mvc\Controller\AbstractActionController;

class HomeController extends AbstractActionController
{
    private $renderer;
    private $handler;

    public function __construct(
        TemplateRendererInterface $renderer,
        BrowserErrorEventHandler $handler
    ) {
        $this->renderer = $renderer;
        $this->handler = $handler;
    }


    public function indexAction(): HtmlResponse
    {
        return new HtmlResponse(
            $this->renderer->render('app::index.html.twig')
        );
    }

    public function errorAction(string $message = "")
    {
        if (!empty(LoggerFacade::error($message))) {
            $this->handler->setMessage($message);
        }
    }
}
