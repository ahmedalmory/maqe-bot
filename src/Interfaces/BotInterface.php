<?php

namespace App\Interfaces;

interface BotInterface
{
    public function turnRight(int $times): void;
    public function turnLeft(int $times): void;
    public function walk(int $distance): void;

    public function getX(): int;
    public function getY(): int;
    public function getCurrentDirection(): string;
}