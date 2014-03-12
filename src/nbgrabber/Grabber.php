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

    }
}
