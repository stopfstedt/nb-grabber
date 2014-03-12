<?php

namespace nbgrabber;

abstract class FileSystemWriter implements Writer
{
    /**
     * @var string
     */
    protected $_basedir;

    /**
     * @param string $basedir
     * @throws \Exception
     */
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

    /**
     * @param array $segments
     * @return string
     */
    protected function _buildPath (array $segments = array())
    {
        $path = $this->_basedir;
        foreach ($segments as $segment) {
            $path .= '/' . basename($segment);
        }
        return $path;
    }

    /**
     * To be implemented by extending classes.
     * @return string
     */
    abstract protected function _getOutputDirPrefix();

    public function printMeta ($agency)
    {
        $dirpath = $this->_buildPath(array($this->_getOutputDirPrefix(), $agency));
        $filepath = "{$dirpath}/README.md";
        $fh = fopen($filepath, "w+");
        fputs($fh, "Generated with [nb-grabber](https://github.com/stopfstedt/nb-grabber) at " . date("Y-m-d H:i:s") . ".\n");
        fclose($fh);
    }
}
