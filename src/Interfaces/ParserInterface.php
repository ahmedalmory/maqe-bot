<?php

namespace App\Interfaces;

use App\Interfaces\BotCommandInterface;
interface ParserInterface
{
    /**
    * @return array<BotCommandInterface>
    */
    public static function parse(string $content): array;
}