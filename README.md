# Advent Of Code (PHP)

[![Test](https://github.com/pacoorozco/advent-of-code-php/actions/workflows/test.yml/badge.svg)](https://github.com/pacoorozco/advent-of-code-php/actions/workflows/test.yml)
![php](https://img.shields.io/github/languages/top/pacoorozco/advent-of-code-php?style=flat-square)

## Installation

### Requirement

- php 8.0 or Higher

### Running

```sh
$ git clone https://github.com/pacoorozco/advent-of-code-php.git

$ composer install
```

```sh
$ bin/console puzzle:exec [-y|--year YEAR] [-d|--day DAY] [-p|--puzzle PUZZLE]
```

### Testing

```sh
$ vendor/bin/phpunit --testdox tests/<YEAR>/<DAY>
```