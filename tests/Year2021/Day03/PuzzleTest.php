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

        $this->assertEquals(230, $this->puzzle->part2($input));
    }

    /**
     * @dataProvider oxygenSupportRatingDataProvider
     */
    public function testOxygenGeneratorRating(array $input, int $expected): void
    {
        $puzzle = new Puzzle();
        $this->assertEquals($expected, $puzzle->oxygenGeneratorRating($input));

    }

    public function oxygenSupportRatingDataProvider(): array
    {
        return [
            [
                ['11011', '00100'],
                27,
            ],
            [
                [
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
                ],
                23
            ]
        ];
    }

    /**
     * @dataProvider co2ScrubberRatingDataProvider
     */
    public function testCO2ScrubberRating(array $input, int $expected): void
    {
        $puzzle = new Puzzle();
        $this->assertEquals($expected, $puzzle->co2ScrubberRating($input));

    }

    public function co2ScrubberRatingDataProvider(): array
    {
        return [
            [
                ['11011', '00100'],
                4,
            ],
            [
                [
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
                ],
                10
            ]
        ];
    }

    public function testSelectLinesWithValueInColumn(): void
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
        $value = 1;
        $expected = [
            '11110',
            '10110',
            '10111',
            '10101',
            '11100',
            '10000',
            '11001',
        ];

        $this->assertEquals($expected, $this->puzzle->selectLinesWithValueInColumn($input, $value, 0));
    }

    public function testGetCommonBit(): void
    {
        $input = [
            '11011',
            '11010',
            '00100',
        ];
        $expected = 1;

        $this->assertEquals($expected, $this->puzzle->getCommonBit($input, 0));
    }

    protected function setUp(): void
    {
        $this->puzzle = new Puzzle();
    }
}
