<?php
declare(strict_types=1);

namespace Domain\TicTacToe\Type;

use Domain\TicTacToe\Exception\NotAllowedTypeValue;

class PlayerType
{
    const AI_TYPE = 'AI';
    const REAL_TYPE = 'Real';


    private $value;

    public function __construct($value)
    {
        if (!\in_array(
            $value,
            [
                self::AI_TYPE,
                self::REAL_TYPE
            ]
        )) {
            throw new NotAllowedTypeValue();
        }
        $this->value = $value;
    }


    public function value()
    {
        return $this->value;
    }
}
