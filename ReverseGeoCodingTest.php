<?php
include __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/ReverseGeoCoding.php';
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
        $reverseGeoCoding = new ReverseGeoCoding('33.7294', '73.0931');

        $countryName = $reverseGeoCoding->getCountryName();

        $cityName = $reverseGeoCoding->getcityName();

        $this->assertEquals('pk', $countryName);

        $this->assertEquals('Islamabad', $cityName);
    }
}