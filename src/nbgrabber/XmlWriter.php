<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 3/11/14
 * Time: 3:54 PM
 */

namespace nbgrabber;


class XmlWriter implements Writer
{

    protected $_outputDirPrefix = '_xml';

    protected $_basedir;

    public function __construct ($basedir)
    {

        if (! is_dir($basedir)) {
            throw new \Exception("{$basedir} is not a directory.");
        }

        if (! is_writable($basedir)) {
            throw new \Exception("{$basedir} is not writable.");
        }

        $this->_basedir = $basedir;

    }

    public function printRouteList(\SimpleXMLElement $doc, $agency)
    {
        $dirpath = $this->_buildPath(array($this->_outputDirPrefix, $agency));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/routes.xml";
        $doc->saveXML($filepath);
    }

    public function printRouteConfig(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_outputDirPrefix, $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/route.xml";
        $doc->saveXML($filepath);
    }

    public function printSchedule(\SimpleXMLElement $doc, $agency, $route)
    {
        $dirpath = $this->_buildPath(array($this->_outputDirPrefix, $agency, $route));
        if (! file_exists($dirpath)) {
            mkdir($dirpath, 0755, true);
        }
        $filepath = $dirpath . "/schedule.xml";
        $doc->saveXML($filepath);
    }

    protected function _buildPath (array $segments = array())
    {
        $path = $this->_basedir;
        foreach ($segments as $segment) {
            $path .= '/' . basename($segment);
        }
        return $path;
    }
}
