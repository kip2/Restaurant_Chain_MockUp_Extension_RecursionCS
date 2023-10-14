<?php

require_once __DIR__ . '/../../../src/Companies/Restaurants/RestaurantLocation.php';
require_once __DIR__ . '/../../../src/Helpers/RandomGenerator.php';

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

    public function testToString () {
        $location = RandomGenerator::restaurantLocation();

        $answer = sprintf("Location: %s\n
            Address: %s\n
            City: %s\n
            State: %s\n
            ZipCode: %s\n
            Employees: %s\n
            Open?: %s\n
            DriveThru?: %s\n
            ",
                $location->getName(),
                $location->getAddress(),
                $location->getCity(),
                $location->getState(),
                $location->getZipCode(),
                $location->employeesToString(),
                $location->getIsOpen() ? "Yes" : "No",
                $location->getHasDriveThru() ? "Yes" : "No"
        );

        $this->assertEquals($answer, $location->toString());
    }

    public function testEmployeesToString () {
        $location = RandomGenerator::restaurantLocation();
        $answer = "";
        foreach($location->getEmployees() as $employee) {
            $answer .= $employee->toString() . "\n";
        }
        $this->assertEquals($answer, $location->employeesToString());
    }

    public function testToHTML() {
        $location = RandomGenerator::restaurantLocation();

        $answer = sprintf("<div class='location-card'>
                    <h2>Location: %s</h2>
                    <p>%s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>Zip Code: %s</p>
                    <div>%s</div>
                    <p>Open?: %s</p>
                    <p>Drive Thru?: %s</p>
                </div>",
                $location->getName(),
                $location->getAddress(),
                $location->getCity(),
                $location->getState(),
                $location->getZipCode(),
                $location->employeesToHTML(),
                $location->getIsOpen() ? "Yes" : "No",
                $location->getHasDriveThru() ? "Yes" : "No"
            );

        $this->assertEquals($answer, $location->toHTML());
    }

    public function testEmployeesToHTML() {
        $location = RandomGenerator::restaurantLocation();
        $answer = "";
        foreach($location->getEmployees() as $employee) {
            $answer .= $employee->toHTML() . "\n";
        }
        $this->assertEquals($answer, $location->employeesToHTML());
    }

    public function testToMarkdown() {
        $location = RandomGenerator::restaurantLocation();

        $answer = sprintf("## Name: %s
                    - Address: %s
                    - City: %s
                    - State: %s
                    - Zip Code: %s
                    - Employees: %s
                    - Open?: %s
                    - Drive Thru?: %s",
            $location->getName(),
            $location->getAddress(),
            $location->getCity(),
            $location->getState(),
            $location->getZipCode(),
            $location->employeesToMarkdown(),
            $location->getIsOpen() ? "Yes" : "No",
            $location->getHasDriveThru() ? "Yes" : "No"
        );

        $this->assertEquals($answer, $location->toMarkdown());
    }

    public function testEmployeesToMarkdown() {
        $location = RandomGenerator::restaurantLocation();

        $answer = "";
        foreach($location->getEmployees() as $employee) {
            $answer .= $employee->toMarkdown() . "\n";
        }

        $this->assertEquals($answer, $location->employeesToMarkdown());
    }

    public function testToArray() {
        $location = RandomGenerator::restaurantLocation();

        $answer = [
            "name" => $location->getName(),
            "address" => $location->getAddress(),
            "city" => $location->getCity(),
            "state" => $location->getState(),
            "zipCode" => $location->getZipCode(),
            "employees" => $location->getEmployees(),
            "isOpen" => $location->getIsOpen(),
            "hasDriveThru" => $location->getHasDriveThru()
        ];

        $this->assertEquals($answer, $location->toArray());
    }

    public function testIntroduction() {
        $restaurantLocation = $this->mockRestaurantLocation();

        $printString = " Address: {$restaurantLocation->getName()}, {$restaurantLocation->getAddress()}, {$restaurantLocation->getCity()}, {$restaurantLocation->getState()},  ZipCode: {$restaurantLocation->getZipCode()}, ";
        $printString .= " Open?: " ;
        $printString .= ($restaurantLocation->getIsOpen()) ? "Yes" : "No";
        $printString .= "\n";

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