<?php
declare(strict_types=1);

namespace TicTacToeTest\integration\Controller;

use Application\App\Controller\HomeController;
use DMore\ChromeDriver\ChromeDriver;
use PHPUnit\Framework\TestCase;
use Behat\Mink\Session;

class HomeControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    /**
     * @var ChromeDriver
     */
    protected $driver;

    public function setUp()
    {
        $chromeUrl = 'http://localhost:9222';
        $this->driver = new ChromeDriver($chromeUrl, null, 'http://localhost:8080');
    }


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

    /**
     * @test
     */
    public function anyAction()
    {
        $session = $this->startSession();
        $session->visit('http://localhost:8080');
        $page = $session->getPage();
        $this->assertTrue($page->hasContent('Hello'));
    }


    /**
     * @return Session
     */
    protected function startSession()
    {
        $session = new Session($this->driver);
        $session->start();

        return $session;
    }
}
