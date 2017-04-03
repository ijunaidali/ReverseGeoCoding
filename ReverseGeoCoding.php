<?php

/**
 * Created by PhpStorm.
 * User: junai
 * Date: 4/4/2017
 * Time: 1:05 AM
 */

class ReverseGeoCoding
{
    private $lat;
    private $long;

    public function __construct($lat, $long)
    {
        $this->lat = $lat;
        $this->long = $long;
    }
    public function getCountryName()
    {
        
    }
}