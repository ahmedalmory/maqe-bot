<?php

use App\Bot;
use App\BotCommander;
use App\Commands\TurnCommand;
use App\Commands\WalkCommand;
use App\Enums\TurnDirection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WalkCommand::class)]
#[UsesClass(Bot::class)]
#[UsesClass(BotCommander::class)]
class WalkCommandTest extends TestCase
{
    #[Test]
    public function it_walks(): void
    {
        $botCommander = new BotCommander(new Bot());

        $this->assertEquals(0, $botCommander->getBot()->getY(),);
        $botCommander->execute([new WalkCommand(5)]);

        $this->assertEquals(5, $botCommander->getBot()->getY(),);
    }
}
