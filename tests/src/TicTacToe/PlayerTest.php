<?php
declare(strict_types=1);

namespace TicTacToeTest\src\TicTacToe;

use PHPUnit\Framework\TestCase;
use \TicTacToe\Domain\Game as TicTacToe;
use \TicTacToe\Domain\Player;
use \TicTacToe\Domain\Symbol;
use \TicTacToe\Domain\Game\History;

class PlayerTest extends TestCase
{
    /**
     * @test
     */
    public function player_has_symbol()
    {
        $history = new History();
        $game = new TicTacToe($history);
        $symbol = new Symbol(Symbol::PLAYER_X_SYMBOL);

        $player = new Player($symbol, $game);
        self::assertEquals($symbol, $player->symbol());
    }
}
