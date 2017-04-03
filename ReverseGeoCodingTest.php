<?php
require __DIR__ . "/ReverseGeoCoding.php";
/**
 * Created by PhpStorm.
 * User: junai
 * Date: 4/4/2017
 * Time: 12:30 AM
 */

use PHPUnit\Framework\TestCase;

class ReverseGeoCodingTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldConvertLatitudeAndLongitudeIntoAddress()
    {
        /*$this->get('http://nominatim.openstreetmap.org/reverse?format=json&lat=52.5487429714954&lon=-1.81602098644987&zoom=10&addressdetails=1')->seeJsonStructure(
            [
                'place_id',
                'licence',
                'osm_type',
                'osm_id',
                'lat',
                'lon',
                'display_name',


                ]
            ]
        );*/


        $reverseGeoCoding = new ReverseGeoCoding();

        $countryName = $reverseGeoCoding->getCountryName();

        $this->assertEquals('United Kingdom', $countryName);
    }
}