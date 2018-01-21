<?php
declare(strict_types=1);

namespace TicTacToeTest\integration\Controller;

use Application\Factory\HomeControllerFactory;
use ExpressiveLogger\Logger;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    private $container;
    private $controller;

    public function setUp()
    {
        $this->container = require dirname(__DIR__, 3) . '/config/container.php';
        $factory = new HomeControllerFactory();
        $this->controller = $factory($this->container, "Controller");
    }


    /**
     * @test
     */
    public function indexAction()
    {
        self::assertEquals(
            self::HTTP_OK_CODE,
            $this->controller->indexAction()->getStatusCode()
        );
    }

    /**
     * @test
     */
    public function loggingByMonolog()
    {
        $this->controller->testAction('Wrong argument.');

        $logContent = \file_get_contents('data/log/error.log');
        self::assertTrue(\strpos($logContent, "Wrong argument. - was put") > 0);
    }
}
