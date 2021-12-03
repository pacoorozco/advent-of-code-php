<?php

namespace App\Puzzle;

abstract class AbstractPuzzle implements InterfacePuzzle
{
    /**
     * Map input file to array in default mode
     */
    public function read(): array
    {
        return (array) file($this->getInputPath(), FILE_IGNORE_NEW_LINES);
    }

    /**
     * Get path of the input file
     */
    public function getInputPath(): string
    {
        $path = (string) (new \ReflectionClass($this))->getFileName();

        $name = (string) (new \ReflectionClass($this))->getShortName();

        return str_replace($name.'.php', 'input.txt', $path);
    }

    /**
     * Write output in a console
     */
    public function write(string $string): void
    {
        echo "\nResult: \e[0;30;42m ".$string." \e[0m\n\n";
    }
}
