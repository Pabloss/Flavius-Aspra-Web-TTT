<?php
declare(strict_types=1);

namespace TicTacToeTest\integration\acceptance\Controller;

use Behat\Mink\Session;
use DMore\ChromeDriver\ChromeDriver;
use ExpressiveLogger\Logger;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;

class HomeControllerTest extends TestCase
{
    const HTTP_OK_CODE = 200;
    const WEBSITE_URL = 'http://localhost:8080';
    const CHROME_URL = 'http://localhost:9222';

    /** @var ServiceManager $container */
    private $container;
    private $app;
    /**
     * @var ChromeDriver
     */
    protected $driver;

    public function setUp()
    {
        $this->driver = new ChromeDriver(
            self::CHROME_URL,
            null,
            self::WEBSITE_URL
        );
        $this->container = require dirname(__DIR__, 3) . '/config/container.php';
        $this->app = $this->container->get(\Zend\Expressive\Application::class);
    }

    /**
     * @test
     */
    public function anyAction()
    {
        $session = $this->startSession();
        $session->visit(
            self::WEBSITE_URL . '/controller'
        );
        $gameClickSequence = [
            [1, 1],
            [0, 0],
            [0, 1],
            [0, 2],
            [2, 1],
        ];
        foreach ($gameClickSequence as $step) {
            $element = $this->iClickOnTheElementWithCSSSelector(
                $session,
                'div.row-' . $step[0] . ' div.column-' . $step[1] . ' div.square-responsive div.content'
            );
            $this->assertTrue(!empty($element->getHtml()));
        }
    }

    /**
     * @test
     */
    public function errorAction()
    {
        $message = "This is a message only to catch by logger";
        $session = $this->startSession();
        $session->visit(
            self::WEBSITE_URL . '/controller/error/' . $message
        );

        $logContent = \file_get_contents('data/log/error.log');
        self::assertTrue(\strpos($logContent, $message) > 0);
    }


    /**
     * @test
     */
    public function complete_happy_path_gameplay()
    {
        $session = $this->startSession();
        $session->visit(
            self::WEBSITE_URL . '/controller'
        );

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

    /**
     * Click on the element with the provided CSS Selector
     *
     * @When /^I click on the element with css selector "([^"]*)"$/
     */
    public function iClickOnTheElementWithCSSSelector($session, $cssSelector)
    {
        $element = $session->getPage()->find(
            'xpath',
            $session->getSelectorsHandler()->selectorToXpath('css', $cssSelector) // just changed xpath to css
        );
        if (null === $element) {
            throw new \InvalidArgumentException(sprintf('Could not evaluate CSS Selector: "%s"', $cssSelector));
        }

        $element->click();
        return $element;
    }
}
