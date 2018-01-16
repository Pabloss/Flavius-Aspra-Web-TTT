<?php
declare(strict_types=1);

namespace TicTacToeTest\integration;

use PHPUnit\Framework\TestCase;
use \TicTacToe\Domain\Game as TicTacToe;
use \TicTacToe\Domain\Player;
use \TicTacToe\Domain\Symbol;
use \TicTacToe\Domain\Game\History;

class GameTest extends TestCase
{

    /**
     * @test
     */
    public function create_players()
    {
        $history = new History();
        $game = new TicTacToe($history);
        list($playerX, $player0) = $game->players(new Symbol('X'), new Symbol('0'));
        self::assertInstanceOf(Player::class, $playerX);
        self::assertInstanceOf(Player::class, $player0);
    }

    /**
     * @test
     */
    public function factor_players()
    {
        $history = new History();
        $game = new TicTacToe($history);
        list($playerX, $player0) = $game->players(new Symbol('X'), new Symbol('0'));
        self::assertEquals('X', $playerX->symbol()->value());
        self::assertEquals('0', $player0->symbol()->value());
    }

    /**
     * @test
     */
    public function duplicate_players_not_allowed()
    {
        $history = new History();
        $game = new TicTacToe($history);
        $game->players(new Symbol('X'), new Symbol('X'));
        self::assertEquals(
            TicTacToe::DUPLICATED_PLAYERS_ERROR,
            $game->errors() & TicTacToe::DUPLICATED_PLAYERS_ERROR
        );
    }

    /**
     * @test
     */
    public function players_take_turns()
    {
        $history = new History();
        $game = new TicTacToe($history);
        list($playerX, $player0) = $game->players(new Symbol('X'), new Symbol('0'));
        $playerX->takeTile(new \TicTacToe\Domain\Tile(0, 0));
        $playerX->takeTile(new \TicTacToe\Domain\Tile(1, 1));
        self::assertEquals(
            TicTacToe::DUPLICATED_TURNS_ERROR,
            $game->errors() & TicTacToe::DUPLICATED_TURNS_ERROR
        );
    }

    /**
     * @test
     */
    public function game_could_not_allow_to_be_started_by_player0()
    {
        $history = new History();
        $game = new TicTacToe($history);
        list($playerX, $player0) = $game->players(new Symbol('X'), new Symbol('0'));
        $player0->takeTile(new \TicTacToe\Domain\Tile(0, 0));

        self::assertEquals(
            TicTacToe::GAME_STARTED_BY_PLAYER0_ERROR,
            $game->errors() & TicTacToe::GAME_STARTED_BY_PLAYER0_ERROR
        );
    }
}
