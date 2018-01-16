<?php
declare(strict_types=1);

namespace TicTacToeTest\src\TicTacToe\Domain\Type;

use PHPUnit\Framework\TestCase;

class PlayerTypeTest extends TestCase
{
    /**
     * @test
     * @expectedException \TicTacToe\Domain\Exception\NotAllowedTypeValue
     */
    public function types()
    {
        $type = new \TicTacToe\Domain\Type\PlayerType('AI');
        self::assertEquals('AI', $type->value());

        $type = new \TicTacToe\Domain\Type\PlayerType('Real');
        self::assertEquals('Real', $type->value());

        $type = new \TicTacToe\Domain\Type\PlayerType('#');
    }
}
