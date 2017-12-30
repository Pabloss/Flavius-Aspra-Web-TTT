<?php
declare(strict_types=1);

namespace TicTacToeTest\integration\Controller;

use Application\App\Controller\HomeController;
use PHPUnit\Framework\TestCase;

class HomeControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    /**
     * @test
     */
    public function indexAction()
    {
        $controller = new HomeController();
        self::assertEquals(
            self::HTTP_OK_CODE,
            $controller->indexAction()->getStatusCode()
        );
    }
}
