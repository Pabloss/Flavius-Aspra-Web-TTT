<?php
declare(strict_types=1);

namespace TicTacToeTest\integration\Controller;

use Application\Factory\HomeControllerFactory;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    private $container;

    public function setUp()
    {
        $this->container = require dirname(__DIR__, 3) . '/config/container.php';
    }


    /**
     * @test
     */
    public function indexAction()
    {
        $factory = new HomeControllerFactory();
        $controller = $factory($this->container, "Controller");
        self::assertEquals(
            self::HTTP_OK_CODE,
            $controller->indexAction()->getStatusCode()
        );
    }
}
