<?php

if (2 !== $argc) {
    die("Usage: php nb-grabber <agency-name>\n");
}

require_once __DIR__ . '/vendor/autoload.php';

$writer = new nbgrabber\XmlWriter(__DIR__);
$grabber = new nbgrabber\Grabber($writer, $argv[1]);
$grabber->export();
