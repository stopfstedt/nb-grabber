<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 3/11/14
 * Time: 3:54 PM
 */

namespace nbgrabber;


class XmlWriter extends FileSystemWriter
{

    public function printRouteList(\SimpleXMLElement $doc, $agency)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/routes.xml";
        $doc->saveXML($filepath);
    }

    public function printRouteConfig(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/route.xml";
        $doc->saveXML($filepath);
    }

    public function printSchedule(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/schedule.xml";
        $doc->saveXML($filepath);
    }

    protected function _getOutputDirPrefix ()
    {
        return "_xml";
    }
}
