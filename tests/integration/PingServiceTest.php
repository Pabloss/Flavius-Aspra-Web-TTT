<?php
declare(strict_types=1);

namespace TicTacToeTest\integration;

use Application\App\Service\PingService;
use PHPUnit\Framework\TestCase;

class PingServiceTest extends TestCase
{
    const HTTP_OK_CODE = 200;

    /**
     * @test
     */
    public function ping()
    {
        $service = new PingService();
        $response = $service->ping();
        self::assertEquals(self::HTTP_OK_CODE, $response->getStatusCode());
        self::assertContains('ack', $response->getBody()->getContents());
    }
}
