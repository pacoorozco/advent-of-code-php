<?php

namespace App\Year2021\Day02;

class Submarine
{
    private int $x;
    private int $depth;

    public function __construct()
    {
        $this->x = 0;
        $this->depth = 0;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function move(string $instruction): void
    {
        [$direction, $units] = explode(' ', $instruction);

        match ($direction) {
            'forward' => $this->x += (int) $units,
            'up' => $this->depth -= (int) $units,
            'down' => $this->depth += (int) $units,
        };
    }
}
