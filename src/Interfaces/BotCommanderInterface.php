<?php

namespace App\Interfaces;

use App\Interfaces\BotCommandInterface;
interface BotCommanderInterface
{
    public function __construct(BotInterface $bot);
    
    /**
     * @param array<BotCommandInterface> $commands
     */
    public function execute(array $commands): void;

    public function getBot(): BotInterface;
}
