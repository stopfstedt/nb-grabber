<?php

namespace nbgrabber;

/**
 * Class ApiClient
 * @package nbgrabber
 */
class ApiClient
{
    /**
     * @var string
     */
    const API_ENDPOINT = 'http://webservices.nextbus.com/service/publicXMLFeed';

    /**
     * @var string
     */
    const COMMAND_ROUTELIST = 'routeList';

    /**
     * @var string
     */
    const COMMAND_ROUTECONFIG = 'routeConfig';

    /**
     * @var string
     */
    const COMMAND_SCHEDULE = 'schedule';

    /**
     * @var string
     */
    protected $_url;

    /**
     * @param string $url
     */
    public function __construct ($url = ApiClient::API_ENDPOINT)
    {
        $this->_url = $url;
    }

    /**
     * @param string $agencyTag
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public function getRouteList ($agencyTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_ROUTELIST, array('a' => $agencyTag));
        return $this->_request($url);

    }

    /**
     * @param string $agencyTag
     * @param string $routeTag
     * @return \SimpleXMLElement
     * @throws \Exception
     *
     */
    public function getRouteConfig ($agencyTag, $routeTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_ROUTECONFIG, array('a' => $agencyTag, 'r' => $routeTag));
        return $this->_request($url);
    }

    /**
     * @param string $agencyTag
     * @param string $routeTag
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    public function getSchedule ($agencyTag, $routeTag)
    {
        $url = $this->_buildRequestUrl(self::COMMAND_SCHEDULE, array('a' => $agencyTag, 'r' => $routeTag));
        return $this->_request($url);
    }

    /**
     * @param string $url
     * @return \SimpleXMLElement
     * @throws \Exception
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
        $url .= '?command=' . rawurlencode($command);
        foreach ($args as $key => $arg) {
            $url .= "&" . rawurlencode($key) . '=' . rawurlencode($arg);
        }
        return $url;
    }
}
