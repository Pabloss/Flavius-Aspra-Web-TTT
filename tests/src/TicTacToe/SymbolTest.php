<?php
declare(strict_types=1);

namespace TicTacToeTest\src\TicTacToe;

use PHPUnit\Framework\TestCase;

class SymbolTest extends TestCase
{
    /**
     * @test
     * @expectedException TicTacToe\Domain\Exception\NotAllowedSymbolValue
     */
    public function validate_symbol()
    {
        /**
         * Put here all posible cases of wrong initialization arguments
         */
        $symbol = new \TicTacToe\Domain\Symbol('#');
        $symbol = new \TicTacToe\Domain\Symbol(0);
        $symbol = new \TicTacToe\Domain\Symbol(-1);
        $symbol = new \TicTacToe\Domain\Symbol(null);
        $symbol = new \TicTacToe\Domain\Symbol(new \stdClass());
        $symbol = new \TicTacToe\Domain\Symbol(\json_decode(['x' => 'y']));
    }

    /**
     * @test
     */
    public function get_symbol()
    {
        $symbol = new \TicTacToe\Domain\Symbol('X');
        self::assertEquals('X', $symbol->value());

        $symbol = new \TicTacToe\Domain\Symbol('0');
        self::assertEquals('0', $symbol->value());
    }
}
