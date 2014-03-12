<?php

$usage = "Usage: php nb-grabber <agency-name>\n [xml|csv-schedule]";

if (3 !== $argc) {
    die($usage);
}

if (! in_array($argv[2], array('xml', 'csv-schedule'))) {
    die($usage);
}


require_once __DIR__ . '/vendor/autoload.php';

// @todo use factory instead
switch ($argv[2]) {
    case 'xml' :
        $writer = new nbgrabber\XmlWriter(__DIR__);
        break;
    case 'csv-schedule' :
        $writer = new nbgrabber\CsvSchedulePrinter(__DIR__);
        break;
    default:
        die($usage);
}

$grabber = new nbgrabber\Grabber($writer, $argv[1]);
$grabber->export();
