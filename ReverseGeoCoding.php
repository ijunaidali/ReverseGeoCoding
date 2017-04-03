<?php
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: junai
 * Date: 4/4/2017
 * Time: 1:05 AM
 */

class ReverseGeoCoding
{
    private $lat;

    private $lon;

    private $countryName;

    private $cityName;

    public function __construct($lat, $lon)
    {
        $this->lat = $lat;

        $this->lon = $lon;

        $this->convertLatLongIntoAddress();
    }

    public function getCountryName()
    {
        return $this->countryName;
    }

    public function getCityName()
    {
        return $this->cityName;
    }

    public function setCountryName($name)
    {
        $this->countryName = $name;
    }

    public function setCityName($name)
    {
        $this->cityName = $name;
    }

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