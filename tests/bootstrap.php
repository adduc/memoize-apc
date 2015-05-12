<?php

if (!ini_get('apc.enable_cli')) {
    echo "php.ini setting 'apc.enable_cli' must be enabled to run tests.\n";
    die(1);
}

require __DIR__ . '/../vendor/autoload.php';
