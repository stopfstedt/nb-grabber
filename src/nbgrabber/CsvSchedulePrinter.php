<?php

namespace nbgrabber;

/**
 * Class CsvSchedulePrinter
 * @package nbgrabber
 */
class CsvSchedulePrinter extends FileSystemWriter
{
    /**
     * @see Writer::printRouteList()
     */
    public function printRouteList (\SimpleXMLElement $doc, $agency)
    {
        // not implemented
    }

    /**
     * @see Writer::printRouteConfig()
     */
    public function printRouteConfig (\SimpleXMLElement $doc, $agency, $route)
    {
        // not implemented
    }

    /**
     * @see Writer::printSchedule()
     */
    public function printSchedule (\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        foreach ($doc->route as $r) {
            $direction = $r['direction']; // e.g. east or west
            $variant = $r['serviceClass']; // weekday or weekend
            $filename = "{$route}_{$variant}_{$direction}.csv";
            $filepath = $dirpath . "/" . $filename;
            $fh = fopen($filepath, "w+");
            $row = array();
            foreach ($r->header->stop as $stop) {
                $row[] = $stop->__toString();

            }
            fputcsv($fh, $row);
            foreach($r->tr as $tr) {
                $row = array();
                foreach ($tr->stop as $stop) {
                    $row[] = $stop->__toString();
                }
                fputcsv($fh, $row);
            }
            fclose($fh);
        }
    }

    /**
     * @see FileSystemPrinter::_getOutputDirPrefix()
     */
    protected function _getOutputDirPrefix ()
    {
        return "_csvschedule";
    }
}
