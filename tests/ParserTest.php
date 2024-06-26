<?php

use App\Commands\TurnLeftCommand;
use App\Commands\TurnRightCommand;
use App\Commands\WalkCommand;
use App\Parser;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Parser::class)]
#[UsesClass(TurnRightCommand::class)]
#[UsesClass(TurnLeftCommand::class)]
#[UsesClass(WalkCommand::class)]
class ParserTest extends TestCase
{
    #[Test] #[DataProvider("commands")]
    public function it_executes_a_bot_command($command, $expected)
    {

        $parsed = Parser::parse($command);

        $this->assertEquals($expected, $parsed);
    }

    public static function commands(): array
    {
        return [
            [
                "W5RW5RW2RW1RB",
                [
                    new WalkCommand(5),
                    new TurnRightCommand(1),
                    new WalkCommand(5),
                    new TurnRightCommand(1),
                    new WalkCommand(2),
                    new TurnRightCommand(1),
                    new WalkCommand(1),
                    new TurnRightCommand(1),
                    new WalkCommand(-1),
                ]
            ],
            [
                "RRW11RLLW19RRW12LW1",
                [
                    new TurnRightCommand(1),
                    new TurnRightCommand(1),
                    new WalkCommand(11),
                    new TurnRightCommand(1),
                    new TurnLeftCommand(1),
                    new TurnLeftCommand(1),
                    new WalkCommand(19),
                    new TurnRightCommand(1),
                    new TurnRightCommand(1),
                    new WalkCommand(12),
                    new TurnLeftCommand(1),
                    new WalkCommand(1)
                ]
            ],
        ];
    }
}
