<?php

require_once __DIR__ . '/../../../src/Companies/Restaurants/RestaurantLocation.php';

use PHPUnit\Framework\TestCase;

class RestaurantLocationTest extends TestCase {

    private function mockRestaurantLocation() {
        $name = "test name";
        $address = "test address";
        $city = "test city";
        $state = "test state";
        $zipCode = "test zipCode";
        $employees = array();
        $isOpen = True;
        $hasDriveThru = True;

        $restaurantLocation = new RestaurantLocation( $name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru);

        return $restaurantLocation;

    }

    public function testGetter() {
        $restaurantLocation = $this->mockRestaurantLocation();

        $this->assertEquals("test name", $restaurantLocation->getName());
        $this->assertEquals("test address", $restaurantLocation->getAddress());
        $this->assertEquals("test city", $restaurantLocation->getCity());
        $this->assertEquals("test state", $restaurantLocation->getState());
        $this->assertEquals("test zipCode", $restaurantLocation->getZipCode());
        $this->assertEquals(array(), $restaurantLocation->getEmployees());
        $this->assertEquals(True, $restaurantLocation->getIsOpen());
        $this->assertEquals(True, $restaurantLocation->getHasDriveThru());
    }
}