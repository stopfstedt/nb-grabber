<?php

namespace nbgrabber;

/**
 * Class XmlWriter
 * @package nbgrabber
 */
class XmlWriter extends FileSystemWriter
{

    /**
     * @see Writer::printRouteList()
     */
    public function printRouteList(\SimpleXMLElement $doc, $agency)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/routes.xml";
        $doc->saveXML($filepath);
    }

    /**
     * @see Writer::printRouteConfig()
     */
    public function printRouteConfig(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/route.xml";
        $doc->saveXML($filepath);
    }

    /**
     * @see Writer::printSchedule()
     */
    public function printSchedule(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/schedule.xml";
        $doc->saveXML($filepath);
    }

    /**
     * @see FileSystemWriter::_getOutputDirPrefix()
     */
    protected function _getOutputDirPrefix ()
    {
        return "_xml";
    }
}
