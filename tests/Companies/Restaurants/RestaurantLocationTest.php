<?php

require_once __DIR__ . '/../../../src/Companies/Restaurants/RestaurantLocation.php';

use PHPUnit\Framework\TestCase;

class RestaurantLocationTest extends TestCase {

    private function mockRestaurantLocation() {
        $name = "restaurant1";
        $address = "address1";
        $city = "city1";
        $state = "state1";
        $zipCode = "99999";
        $employees = array();
        $isOpen = True;
        $hasDriveThru = True;

        $restaurantLocation = new RestaurantLocation( $name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru);

        return $restaurantLocation;
    }

    public function testIntroduction() {
        $restaurantLocation = $this->mockRestaurantLocation();

        $printString = " Address: {$restaurantLocation->getName()}, {$restaurantLocation->getAddress()}, {$restaurantLocation->getCity()}, {$restaurantLocation->getState()},  ZipCode: {$restaurantLocation->getZipCode()}, ";
        $printString .= " Open?: " ;
        $printString .= ($restaurantLocation->getIsOpen()) ? "Yes" : "No";

        $this->assertEquals($printString, $restaurantLocation->introduction());
    }

    public function testGetter() {
        $restaurantLocation = $this->mockRestaurantLocation();

        $this->assertEquals("restaurant1", $restaurantLocation->getName());
        $this->assertEquals("address1", $restaurantLocation->getAddress());
        $this->assertEquals("city1", $restaurantLocation->getCity());
        $this->assertEquals("state1", $restaurantLocation->getState());
        $this->assertEquals("99999", $restaurantLocation->getZipCode());
        $this->assertEquals(array(), $restaurantLocation->getEmployees());
        $this->assertEquals(True, $restaurantLocation->getIsOpen());
        $this->assertEquals(True, $restaurantLocation->getHasDriveThru());
    }
}