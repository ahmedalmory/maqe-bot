<?php

use App\Bot;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(Bot::class)]
class BotTest extends TestCase
{
    #[Test]
    public function it_turns_right(): void
    {
        $bot = new Bot();

        $this->assertEquals('North', $bot->getCurrentDirection(),);
        $bot->turnRight();

        $this->assertEquals('East', $bot->getCurrentDirection());
    }

    #[Test]
    public function it_turns_left(): void
    {
        $bot = new Bot();

        $this->assertEquals('North', $bot->getCurrentDirection(),);
        $bot->turnLeft();

        $this->assertEquals('West', $bot->getCurrentDirection(),);
    }

    #[Test]
    public function it_walks_all_around(): void
    {
        $bot = new Bot();

        $bot->walk(5);
        $this->assertEquals('North', $bot->getCurrentDirection(),);
        $this->assertEquals(5, $bot->getY());

        $bot->turnRight();
        $this->assertEquals('East', $bot->getCurrentDirection(),);

        $bot->walk(5);
        $this->assertEquals(5, $bot->getX());

        $bot->turnRight();
        $this->assertEquals('South', $bot->getCurrentDirection(),);

        $bot->walk(5);
        $this->assertEquals(0, $bot->getY());

        $bot->turnRight();
        $this->assertEquals('West', $bot->getCurrentDirection(),);

        $bot->walk(5);
        $this->assertEquals(0, $bot->getX());
    }

    
}
