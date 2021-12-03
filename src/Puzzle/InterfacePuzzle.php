<?php

namespace App\Puzzle;

interface InterfacePuzzle
{
    /**
     * Map input file to array
     */
    public function read(): array;

    /**
     * Write output in
     */
    public function write(string $string): void;

    /**
     * Algorithm for first part
     */
    public function part1(array $array = []): string;

    /**
     * Algorithm for second part
     */
    public function part2(array $array = []): string;
}
