#!/bin/bash
#
# By default, APC will not be enable on the command line (calls to apc_store
# always return false). This script enables APC to ensure calls to apc_store
# work as intended, to allow PHPUnit to run successfully.
##

PHPUNIT="$(which phpunit)"
PHP="$(which php)"

"$PHP" -d apc.enable_cli=1 "$PHPUNIT"
