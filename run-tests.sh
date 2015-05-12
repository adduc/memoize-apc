#!/bin/bash

PHPUNIT="$(which phpunit)"
PHP="$(which php)"

"$PHP" -d apc.enable_cli=1 "$PHPUNIT"
