<?php

namespace App\Year2021\Day02;

use App\Puzzle\AbstractPuzzle;

class Puzzle extends AbstractPuzzle
{
    public function part1(array $input = []): string
    {
        $submarine = new Submarine();

        foreach ($input as $command) {
            $submarine->move($command);
        }

        return $submarine->getX() * $submarine->getDepth();
    }

    public function part2(array $input = []): string
    {
        return 'TODO';
    }
}
