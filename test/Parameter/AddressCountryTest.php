<?php

namespace CultuurNet\SearchV3\Parameter\Test;

use CultuurNet\SearchV3\Parameter\AddressCountry;

class AddressCountryTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $query = new AddressCountry('BE');

        $key = $query->getKey();
        $value = $query->getValue();

        $this->assertEquals($key, 'addressCountry');
        $this->assertEquals($value, 'BE');
    }
}