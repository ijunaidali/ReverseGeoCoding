<?php

namespace ReverseGeoCodingTest\Unit;

use PHPUnit\Framework\TestCase;
use ReverseGeoCoding\ReverseGeoCoding;

/**
 * Class ReverseGeoCodingTest
 * @package ReverseGeoCodingTest\Unit
 */
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