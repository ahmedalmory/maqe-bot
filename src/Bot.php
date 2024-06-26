<?php

namespace App;

use App\Interfaces\BotInterface;
use App\Enums\Direction;

class Bot implements BotInterface
{
    private $cardinalDirections = [
        0 => 'North',
        90 => 'East',
        180 => 'South',
        270 => 'West',
    ];

    private int $currentDirectionDegree = 0;
    private $x = 0;
    private $y = 0;

    public function turnRight(int $times = 1): void
    {
        $this->currentDirectionDegree = ($this->currentDirectionDegree + (90 * $times)) % 360;
    }
    
    public function turnLeft(int $times = 1): void
    {
        $this->currentDirectionDegree = ($this->currentDirectionDegree - (90 * $times)) % 360;
        if ($this->currentDirectionDegree < 0) {
            $this->currentDirectionDegree += 360;
        }
    }

    public function walk(int $distance): void
    {
        switch ($this->currentDirectionDegree) {
            case Direction::NORTH->value:
                $this->y += $distance;
                break;
            case Direction::EAST->value:
                $this->x += $distance;
                break;
            case Direction::SOUTH->value:
                $this->y -= $distance;
                break;
            case Direction::WEST->value:
                $this->x -= $distance;
                break;
        }
    }
    public function getCurrentDirection(): string
    {
        return $this->cardinalDirections[$this->currentDirectionDegree];
    }
    public function getX(): int
    {
        return $this->x;
    }
    public function getY(): int
    {
        return $this->y;
    }

}
