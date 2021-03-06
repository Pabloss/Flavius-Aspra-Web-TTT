<?php
declare(strict_types=1);

namespace Application\Service;

use Zend\Diactoros\Response\JsonResponse;

class PingService
{
    public function ping()
    {
        return new JsonResponse(['ack' => time()]);
    }
}
