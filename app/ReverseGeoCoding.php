<?php

namespace ReverseGeoCoding;

use GuzzleHttp\Client;

/**
 * Class ReverseGeoCoding
 * @package ReverseGeoCoding
 */
class ReverseGeoCoding
{
    /**
     * @var
     */
    private $lat;

    /**
     * @var
     */
    private $lon;

    /**
     * @var
     */
    private $countryName;

    /**
     * @var
     */
    private $cityName;

    /**
     * ReverseGeoCoding constructor.
     * @param $lat
     * @param $lon
     */
    public function __construct($lat, $lon)
    {
        $this->lat = $lat;

        $this->lon = $lon;

        $this->convertLatLongIntoAddress();
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @return mixed
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * @param $name
     */
    public function setCountryName($name)
    {
        $this->countryName = $name;
    }

    /**
     * @param $name
     */
    public function setCityName($name)
    {
        $this->cityName = $name;
    }

    /**
     * convert latitude and longitude into address
     */
    private function convertLatLongIntoAddress()
    {
        $config = [
            'base_uri' => 'http://nominatim.openstreetmap.org/'
        ];

        $client = new Client($config);

        $response = $client->request('GET', '/reverse', [
            'query' => [
                'format' => 'json',
                'lat' => $this->lat,
                'lon' => $this->lon,
                'zoom' => '10',
                'addressdetails' => '1',
            ]
        ]);

        $body = json_decode($response->getBody(), false);

        $this->setCityName($body->address->city);

        $this->setCountryName($body->address->country_code);
    }
}