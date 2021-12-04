<?php

namespace App\Year2021\Day03;

use App\Puzzle\AbstractPuzzle;

class Puzzle extends AbstractPuzzle
{
    /**
     * Read the file separating the data in columns.
     */
    public function read(): array
    {
        $array = [];

        if ($file = fopen($this->getInputPath(), 'r')) {
            while (($line = fgets($file)) !== false) {
                $array[] = $this->stringToArray($line);
            }
            fclose($file);
        }

        return $array;
    }

    /**
     * Return an array containing the characters of the provided string.
     */
    public function stringToArray(string $line): array
    {
        $cols = str_split(trim($line), 1);
        foreach ($cols as $k => $col) {
            $cols[$k] = intval($col);
        }

        return $cols;
    }

    public function part1(array $input = []): string
    {
        $gammaRate = '';
        $epsilonRate = '';

        for ($i = 0; $i < count($input[0]); $i++) {
            $commonBit = $this->getCommonBit($input, $i);

            $gammaRate .= (string) $commonBit;
            $epsilonRate .= (string) ($commonBit ? 0 : 1);
        }

        $gamma = bindec($gammaRate);
        $epsilon = bindec($epsilonRate);

        return (string) ($gamma * $epsilon);
    }

    private function getCommonBit(array $array, int $column): int
    {
        $sum = array_sum(array_column($array, $column));

        return intval($sum > count($array) / 2);
    }

    public function part2(array $input = []): string
    {
        return 'TODO';
    }
}
