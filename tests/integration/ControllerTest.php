<?php
declare(strict_types=1);

namespace TicTacToeTest\integration;

use PHPUnit\Framework\TestCase;
use TicTacToe\App\src\App\Controller\HomeController;

class ControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    /**
     * @test
     */
    public function indexAction()
    {
        $controller = new HomeController();
        $response = $controller->indexAction();
        self::assertEquals(self::HTTP_OK_CODE, $response->getStatusCode());
    }
}
