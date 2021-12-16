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
                //$array[] = $this->stringToArray($line);
                $array[] = $line;
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
        return (string) $this->powerConsumption($input);
    }

    private function powerConsumption(array $input): int
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

        return ($gamma * $epsilon);
    }

    public function getCommonBit(array $array, int $column): int
    {
        $numberOfOnes = 0;
        $numberOfZeros = 0;
        foreach ($array as $line) {
            if ($line[$column] == 1) {
                $numberOfOnes++;
            } else {
                $numberOfZeros++;
            }
        }
        if ($numberOfOnes >= $numberOfZeros) {
            return '1';
        }
        return '0';

    }

    public function part2(array $input = []): string
    {
        return (string) $this->lifeSupportRating($input);
    }

    private function lifeSupportRating(array $input): int
    {
        return $this->oxygenGeneratorRating($input) * $this->co2ScrubberRating($input);
    }

    public function co2ScrubberRating(array $input): int
    {
        $oxygenValues = $input;

        for ($column = 0; count($oxygenValues) != 1; $column++) {
            $mostCommonBit = $this->getCommonBit($oxygenValues, $column) == 1 ? 0 : 1;
            $oxygenValues = $this->selectLinesWithValueInColumn($oxygenValues, $mostCommonBit, $column);
        }

        return bindec($oxygenValues[0]);
    }

    public function selectLinesWithValueInColumn(array $input, int $value, int $column): array
    {
        if (count($input) == 1) {
            return $input;
        }

        $selectedValues = [];
        foreach ($input as $line) {
            if ($line[$column] == $value) {
                $selectedValues[] = $line;
            }
        }
        return $selectedValues;
    }

    public function oxygenGeneratorRating(array $input): int
    {
        $oxygenValues = $input;

        for ($column = 0; count($oxygenValues) != 1; $column++) {
            $mostCommonBit = $this->getCommonBit($oxygenValues, $column);
            $oxygenValues = $this->selectLinesWithValueInColumn($oxygenValues, $mostCommonBit, $column);
        }

        return bindec($oxygenValues[0]);
    }
}
