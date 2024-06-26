<?php

namespace App\Commands;

use App\Enums\Action;
use App\Enums\TurnDirection;
use App\Interfaces\BotCommandInterface;
use App\Interfaces\BotInterface;

class TurnLeftCommand implements BotCommandInterface
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function executeFor(BotInterface $bot): void
    {
            $bot->turnLeft($this->value);
    }
}
