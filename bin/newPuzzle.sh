#!/usr/bin/env bash

# ----------------------------------------------------------------------
# Functions
# ----------------------------------------------------------------------
createFolderStructure() {
  mkdir -p "${SOURCES_PATH}" "${TESTS_PATH}"
  touch "${SOURCES_PATH}/input.txt"
  cp templates/Puzzle.php "${SOURCES_PATH}"
  cp templates/PuzzleTest.php "${TESTS_PATH}"
  sed -i "s/__YEAR__/${YEAR}/g" "${SOURCES_PATH}/Puzzle.php" "${TESTS_PATH}/PuzzleTest.php"
  sed -i "s/__DAY__/${DAY}/g" "${SOURCES_PATH}/Puzzle.php" "${TESTS_PATH}/PuzzleTest.php"
}

usage() {
  cat <<-EndUsage
        Creates the proper folder structure for a Puzzle.

        usage: ${PN} [-h|--help] [-y|--year YEAR] [-d|--day DAY]

        The current year and day will be used as YEAR and DAY if the related options are not set.

EndUsage
}

# ----------------------------------------------------------------------
# Main function
# ----------------------------------------------------------------------
function main() {
  args_management "$@"

  YEAR=${CUSTOM_YEAR:-$(date +%Y)}
  DAY=${CUSTOM_DAY:-$(date +%d)}

  SOURCES_PATH="src/Year${YEAR}/Day${DAY}"
  TESTS_PATH="tests/Year${YEAR}/Day${DAY}"

  createFolderStructure

  exit 0
}

function args_management() {
  while [[ $# -gt 0 ]];
  do
    case $1 in
      -h | --help)
        usage
        exit 0
        ;;
      -y | --year)
        shift
        CUSTOM_YEAR="$1" && shift
        ;;
      -d | --day)
        shift
        CUSTOM_DAY="$1" && shift
        ;;
      *)
        shift
    esac
  done
}

##########################################################################
# Main code
##########################################################################
main "$@"


