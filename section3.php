<?php

use App\Bot;
use App\BotCommander;
use App\Parser;

require './vendor/autoload.php';

$inputFilePath = $argv[1];

$fileContent = file($inputFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$N = (int)$fileContent[0];

$output = [];

// Process each test case
for ($case = 1; $case <= $N; $case++) {
    $movementCommands = $fileContent[$case];

    $botCommander = new BotCommander(new Bot);
    $parsed = Parser::parse($movementCommands);
    $botCommander->execute($parsed);

    $x = $botCommander->getBot()->getX();
    $y = $botCommander->getBot()->getY();
    $direction = $botCommander->getBot()->getCurrentDirection();

    // Prepare output for this test case
    $result = "Case $case: X: $x Y: $y Direction: $direction";
    $output[] = $result;
}

// Write output to file section3.out
$outputFilePath = 'section3.out';
file_put_contents($outputFilePath, implode(PHP_EOL, $output) . PHP_EOL);

echo "Output written to $outputFilePath" . PHP_EOL;
