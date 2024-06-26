<?php

namespace App;

use App\Interfaces\ParserInterface;
use App\Commands\TurnCommand;
use App\Commands\TurnLeftCommand;
use App\Commands\TurnRightCommand;
use App\Commands\WalkCommand;
use App\Enums\TurnDirection;
use App\Interfaces\BotCommandInterface;

class Parser implements ParserInterface
{
    /**
     * @return array<BotCommandInterface>
     */
    public static function parse(string $content): array
    {
        $commands = [];
        $len = strlen($content);
        $i = 0;

        while ($i < $len) {
            switch ($content[$i]) {
                case 'R':
                case 'L':
                case 'W':
                case 'B':
                    $commandType = $content[$i];
                    $number = '';

                    // Check if a number follows the command letter
                    $i++; // Move past the command letter

                    // Accumulate the number
                    while ($i < $len && is_numeric($content[$i])) {
                        $number .= $content[$i];
                        $i++;
                    }

                    // Default to 1 if no number follows
                    if ($number === '') {
                        $number = 1;
                    }

                    // Create the corresponding command object based on commandType
                    switch ($commandType) {
                        case 'R':
                            $commands[] = new TurnRightCommand($number);
                            break;
                        case 'L':
                            $commands[] = new TurnLeftCommand($number);
                            break;
                        case 'W':
                            $commands[] = new WalkCommand($number);
                            break;
                        case 'B':
                            $commands[] = new WalkCommand(-$number);
                            break;
                    }

                    break;
            }
        }

        return $commands;
    }
}
