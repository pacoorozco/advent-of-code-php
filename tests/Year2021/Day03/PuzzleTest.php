<?php

namespace Tests\Year2021\Day03;

use App\Year2021\Day03\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    /**
     * @var Puzzle
     */
    private Puzzle $puzzle;

    public function testPart1(): void
    {
        $input = [
            '00100',
            '11110',
            '10110',
            '10111',
            '10101',
            '01111',
            '00111',
            '11100',
            '10000',
            '11001',
            '00010',
            '01010',
        ];

        $arrayInput = [];
        foreach ($input as $line) {
            $arrayInput[] = $this->puzzle->stringToArray($line);
        }

        $this->assertEquals(198, $this->puzzle->part1($arrayInput));
    }

    public function testPart2(): void
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        $this->puzzle = new Puzzle();
    }
}
