<?php

namespace Tests\Year2021\Day01;

use App\Year2021\Day01\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    /**
     * @var Puzzle
     */
    private Puzzle $puzzle;

    public function testPart1(): void
    {
        $input = [199, 200, 208, 210, 200, 207, 240, 269, 260, 263];
        $this->assertEquals(7, $this->puzzle->part1($input));
    }

    protected function setUp(): void
    {
        $this->puzzle = new Puzzle();
    }
}
