<?php

namespace App\Enums;

enum Direction: int
{
    case NORTH = 0;
    case EAST = 90;
    case SOUTH = 180;
    case WEST = 270;
}
