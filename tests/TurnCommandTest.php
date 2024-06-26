<?php

use App\Bot;
use App\BotCommander;
use App\Commands\TurnLeftCommand;
use App\Commands\TurnRightCommand;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(TurnRightCommand::class)]
#[CoversClass(TurnLeftCommand::class)]
#[UsesClass(Bot::class)]
#[UsesClass(BotCommander::class)]
class TurnCommandTest extends TestCase
{
    #[Test]
    public function it_turns_right(): void
    {
        $botCommander = new BotCommander(new Bot());

        $this->assertEquals('North', $botCommander->getBot()->getCurrentDirection(),);
        $botCommander->execute([new TurnRightCommand(1)]);

        $this->assertEquals("East", $botCommander->getBot()->getCurrentDirection());
    }

    #[Test]
    public function it_turns_left(): void
    {
        $botCommander = new BotCommander(new Bot());

        $this->assertEquals('North', $botCommander->getBot()->getCurrentDirection(),);
        $botCommander->execute([new TurnLeftCommand(1)]);

        $this->assertEquals("West", $botCommander->getBot()->getCurrentDirection());
    }
}
