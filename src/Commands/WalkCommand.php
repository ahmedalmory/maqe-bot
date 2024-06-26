<?php

namespace App\Commands;

use App\Enums\Action;
use App\Interfaces\BotCommandInterface;


class WalkCommand implements BotCommandInterface
{
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function executeFor(\App\Interfaces\BotInterface $bot): void {
        $bot->walk($this->value);
    }
}
