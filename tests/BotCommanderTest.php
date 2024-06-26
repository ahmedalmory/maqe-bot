<?php

use App\Bot;
use App\BotCommander;
use App\Commands\TurnLeftCommand;
use App\Commands\TurnRightCommand;
use App\Commands\WalkCommand;
use App\Parser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(BotCommander::class)]
#[UsesClass(Parser::class)]
#[UsesClass(Bot::class)]
#[UsesClass(TurnRightCommand::class)]
#[UsesClass(TurnLeftCommand::class)]
#[UsesClass(WalkCommand::class)]
class BotCommanderTest extends TestCase
{
    #[Test] #[DataProvider("commands")]
    public function it_executes_a_bot_command($command, $expected)
    {
        $botCommander = new BotCommander(new Bot());

        $parsed = Parser::parse($command);
        $botCommander->execute($parsed);

        $this->assertEquals($expected['x'], $botCommander->getBot()->getX());
        $this->assertEquals($expected['y'], $botCommander->getBot()->getY());
        $this->assertEquals($expected['direction'], $botCommander->getBot()->getCurrentDirection());
    }

    public static function commands(): array
    {
        return [
            ["W5RW5RW2RW1R", ["x" => 4, "y" => 3, "direction" => "North"]],
            ["RRW11RLLW19RRW12LW1", ["x" => 7, "y" => -12, "direction" => "South"]],
            ["LLW100W50RW200W10", ["x" => -210, "y" => -150, "direction" => "West"]],
            ["LLLLLW99RRRRRW88LLLRL", ["x" => -99, "y" => 88, "direction" => "East"]],
            ["W55555RW555555W444444W1", ["x" => 1000000, "y" => 55555, "direction" => "East"]],
        ];
    }
}
