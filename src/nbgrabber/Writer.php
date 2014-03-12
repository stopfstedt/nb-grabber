<?php

namespace nbgrabber;

interface Writer
{
    public function printRouteList (\SimpleXMLElement $doc, $agency);
    public function printRouteConfig (\SimpleXMLElement $doc, $agency, $route);
    public function printSchedule (\SimpleXMLElement $doc, $agency, $route);
}
