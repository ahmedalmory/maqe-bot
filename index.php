<?php


use App\Bot;
use App\BotCommander;
use App\Parser;

require './vendor/autoload.php';

$botCommander = new BotCommander(new Bot);
$parsed = Parser::parse($argv[1]);
$botCommander->execute($parsed);

