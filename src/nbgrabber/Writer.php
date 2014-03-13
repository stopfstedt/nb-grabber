<?php

namespace nbgrabber;

/**
 * Interface Writer
 * @package nbgrabber
 */
interface Writer
{
    /**
     * @param \SimpleXMLElement $doc
     * @param string $agency
     */
    public function printRouteList (\SimpleXMLElement $doc, $agency);

    /**
     * @param \SimpleXMLElement $doc
     * @param string $agency
     * @param string $route
     */
    public function printRouteConfig (\SimpleXMLElement $doc, $agency, $route);

    /**
     * @param \SimpleXMLElement $doc
     * @param string $agency
     * @param string $route
     */
    public function printSchedule (\SimpleXMLElement $doc, $agency, $route);

    /**
     * @param string $agency
     */
    public function printMeta($agency);
}
