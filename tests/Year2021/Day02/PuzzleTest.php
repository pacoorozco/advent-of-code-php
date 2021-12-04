<?php

namespace Tests\Year2021\Day02;

use App\Year2021\Day02\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    /**
     * @var Puzzle
     */
    private Puzzle $puzzle;

    public function testPart1(): void
    {
        $input = ['forward 5', 'down 5', 'forward 8', 'up 3', 'down 8', 'forward 2'];
        $this->assertEquals(150, $this->puzzle->part1($input));
    }

    public function testPart2(): void
    {
        $input = ['forward 5', 'down 5', 'forward 8', 'up 3', 'down 8', 'forward 2'];
        $this->assertEquals(900, $this->puzzle->part2($input));
    }

    protected function setUp(): void
    {
        $this->puzzle = new Puzzle();
    }
}
