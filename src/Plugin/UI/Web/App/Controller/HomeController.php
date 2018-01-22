<?php
declare(strict_types=1);

namespace Application\Controller;

use ExpressiveLogger\Logger;
use ExpressiveLogger\LoggerFacade;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Mvc\Controller\AbstractActionController;

class HomeController extends AbstractActionController
{
    private $renderer;

    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }


    public function indexAction(): HtmlResponse
    {
        LoggerFacade::error('123456 - was put');
        return new HtmlResponse(
            $this->renderer->render('app::index.html.twig')
        );
    }

    public function testAction(string $message)
    {
        LoggerFacade::error($message . ' - was put');
    }

    public function errorAction()
    {
        $message = $this->getRequest()->getContent();
        LoggerFacade::error($message);
    }
}
