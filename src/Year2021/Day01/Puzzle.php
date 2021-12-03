<?php

namespace App\Year2021\Day01;

use App\Puzzle\AbstractPuzzle;

class Puzzle extends AbstractPuzzle
{
    public function part1(array $input = []): string
    {
        return (string) $this->countMeasurement($input);
    }

    private function countMeasurement(array $measurements): int
    {
        $result = 0;

        $previous = $measurements[0];

        foreach ($measurements as $measurement) {
            if ($measurement > $previous) {
                $result++;
            }
            $previous = $measurement;
        }

        return $result;
    }

    public function part2(array $input = []): string
    {
        $slidingWindow = [];

        for ($i = 0; $i < count($input) - 2; $i++) {
            $slidingWindow[] = $input[$i] + $input[$i + 1] + $input[$i + 2];
        }

        return (string) $this->countMeasurement($slidingWindow);
    }
}
