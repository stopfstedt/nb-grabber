<?php

namespace nbgrabber;

class ApiClient
{
    const API_ENDPOINT = 'http://webservices.nextbus.com/service/publicXMLFeed';

    const COMMAND_ROUTELIST = 'routeList';

    const COMMAND_ROUTECONFIG = 'routeConfig';

    const COMMAND_SCHEDULE = 'schedule';

    protected $_url;

    public function __construct ($url = ApiClient::API_ENDPOINT)
    {
        $this->_url = $url;
    }

    /**
     * @return \SimpleXMLElement
     */
    public function getRouteList ($agencyTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_ROUTELIST, array('a' => $agencyTag));
        return $this->_request($url);

    }


    public function getRouteConfig ($agencyTag, $routeTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_ROUTECONFIG, array('a' => $agencyTag, 'r' => $routeTag));
        return $this->_request($url);
    }

    public function getSchedule ($agencyTag, $routeTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_ROUTECONFIG, array('a' => $agencyTag, 'r' => $routeTag));
        return $this->_request($url);
    }

    /**
     * @param $url
     * @return \SimpleXMLElement
     * @throws Exception
     *
     * @link https://gist.github.com/betweenbrain/5405671
     */
    protected function _request ($url)
    {

        $curl = curl_init();

        curl_setopt_array($curl, Array(
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'spider',
            CURLOPT_TIMEOUT => 120,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_ENCODING => 'UTF-8'
        ));

        $data = curl_exec($curl);

        curl_close($curl);

        $xml = new \SimpleXMLElement($data);

        return $xml;
    }

    /**
     * @param string $command
     * @param array $args
     * @return string
     */
    protected function _buildRequestUrl ($command, array $args = array())
    {
        $url = $this->_url;
        $url .= '?command=' . rawurldecode($command);
        foreach ($args as $key => $arg) {
            $url .= "&" . rawurldecode($key) . '=' . rawurldecode($arg);
        }
        return $url;
    }

}
