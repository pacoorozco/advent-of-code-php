<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class PuzzleCommand extends Command
{
    protected static $defaultName = 'puzzle:exec';

    protected function configure(): void
    {
        $currentYear = (new \DateTime())->format("Y");
        $currentDay = (new \DateTime())->format("d");
        $currentPart = 1;

        $this
            ->setDescription('Outputs the solutions of a Puzzles for a given event')
            ->addOption(
                'year',
                'y',
                InputOption::VALUE_REQUIRED,
                'the year of the event',
                $currentYear
            )
            ->addOption(
                'day',
                'd',
                InputOption::VALUE_REQUIRED,
                'the day of the event',
                $currentDay
            )
            ->addOption(
                'part',
                'p',
                InputOption::VALUE_REQUIRED,
                'the part of the puzzle',
                $currentPart
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $year = $input->getOption('year');
        $day = $input->getOption('day');
        $part = $input->getOption('part');

        try {
            $class = sprintf('\\App\\Year%s\\Day%s\\Puzzle', $year, $day);
            $puzzle = new $class();
        } catch (\Error $e) {
            $output->writeln(sprintf('<error>No class found for day %s of year %s</error>', $day, $year));
            return Command::FAILURE;
        }

        switch ($part) {
            case 1:
                $array = $puzzle->read();
                $result = $puzzle->part1($array);
                $puzzle->write($result);
                break;
            case 2:
                $array = $puzzle->read();
                $result = $puzzle->part2($array);
                $puzzle->write($result);
                break;
            default:
                $output->writeln(sprintf('<error>No method found for part %s</error>', $part));
                return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
