<?php

namespace nbgrabber;

class Grabber
{

    protected $_agency;

    protected $_writer;

    protected $_client;

    public function __construct (Writer $writer, $agency)
    {
        $this->_writer = $writer;
        $this->_agency = $agency;
        $this->_client = new ApiClient();
    }

    public function export ()
    {
        $doc = $this->_client->getRouteList($this->_agency);
        $this->_writer->printRouteList($doc, $this->_agency);
        foreach ($doc->route as $route) {
            $routeTag = $route['tag'];
            $doc2 = $this->_client->getRouteConfig($this->_agency, $routeTag);
            $this->_writer->printRouteConfig($doc2, $this->_agency, $routeTag);
            $doc2 = $this->_client->getSchedule($this->_agency, $routeTag);
            $this->_writer->printSchedule($doc2, $this->_agency, $routeTag);
        }
        $this->_writer->printMeta();
    }
}
