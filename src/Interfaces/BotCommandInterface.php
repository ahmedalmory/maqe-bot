<?php

namespace App\Interfaces;

use App\Enums\Action;

interface BotCommandInterface{

    public function __construct(int $times);
    public function executeFor(BotInterface $bot): void;
}