<?php

namespace App;

use App\Interfaces\BotCommanderInterface;
use App\Interfaces\BotCommandInterface;
use App\Interfaces\BotInterface;

class BotCommander implements BotCommanderInterface
{
    private $bot;
    public function __construct(BotInterface $bot)
    {
        $this->bot = $bot;
    }

    /**
     * @param array<BotCommandInterface> $name
     */
    public function execute(array $commands): void
    {
        foreach ($commands as $command) {
            $command->executeFor($this->bot);
        }

    }

    public function getBot(): BotInterface{
        return $this->bot;
    }
}
