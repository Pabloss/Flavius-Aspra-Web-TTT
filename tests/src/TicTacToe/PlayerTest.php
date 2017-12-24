<?php
declare(strict_types=1);

namespace TicTacToeTest\src\TicTacToe;

use Domain\TicTacToe\Game as TicTacToe;
use Domain\TicTacToe\Player;
use Domain\TicTacToe\Symbol;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    /**
     * @test
     */
    public function player_has_symbol()
    {
        $history = new TicTacToe\History();
        $game = new TicTacToe($history);
        $symbol = new Symbol(Symbol::PLAYER_X_SYMBOL);

        $player = new Player($symbol, $game);
        self::assertEquals($symbol, $player->symbol());
    }
}
