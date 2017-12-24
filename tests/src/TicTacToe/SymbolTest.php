<?php
declare(strict_types=1);

namespace TicTacToeTest\src\TicTacToe;

use PHPUnit\Framework\TestCase;

class SymbolTest extends TestCase
{
    /**
     * @test
     * @expectedException Domain\TicTacToe\Exception\NotAllowedSymbolValue
     */
    public function validate_symbol()
    {
        /**
         * Put here all posible cases of wrong initialization arguments
         */
        $symbol = new \Domain\TicTacToe\Symbol('#');
        $symbol = new \Domain\TicTacToe\Symbol(0);
        $symbol = new \Domain\TicTacToe\Symbol(-1);
        $symbol = new \Domain\TicTacToe\Symbol(null);
        $symbol = new \Domain\TicTacToe\Symbol(new \stdClass());
        $symbol = new \Domain\TicTacToe\Symbol(\json_decode(['x' => 'y']));
    }

    /**
     * @test
     */
    public function get_symbol()
    {
        $symbol = new \Domain\TicTacToe\Symbol('X');
        self::assertEquals('X', $symbol->value());

        $symbol = new \Domain\TicTacToe\Symbol('0');
        self::assertEquals('0', $symbol->value());
    }
}
