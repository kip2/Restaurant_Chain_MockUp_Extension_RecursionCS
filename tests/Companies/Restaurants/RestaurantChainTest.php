<?php

require_once __DIR__ . '/../../../src/Companies/Restaurants/RestaurantChain.php';
require_once __DIR__ . '/../../../src/Helpers/RandomGenerator.php';

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class RestaurantChainTest extends TestCase {
    
    private function mockRestaurantChainTest() {
        $name = "name test";
        $foundingYear = 1;
        $description = "test description";
        $website = "http://test.com";
        $phone = "090-0000-9999";
        $industory = "test industory";
        $ceo = "test CEO";
        $isPubliclyTraded = True;
        $country = "test country";
        $founder = "test founder";
        $totalEmployees = 10;
        $chainId = 1;
        $restaurantLocations = array() ;
        $cuisineType = "test cuisineType";
        $numberOfLocations = 1;
        $parentCompany = "test parent company";


        $restaurantChain = new RestaurantChain(
            $name,
            $foundingYear,
            $description,
            $website,
            $phone,
            $industory,
            $ceo,
            $isPubliclyTraded,
            $country,
            $founder,
            $totalEmployees,
            $chainId,
            $restaurantLocations,
            $cuisineType,
            $numberOfLocations,
            $parentCompany
        );
        return $restaurantChain;
    }

    public function testAddLocation() {
        $chain = RandomGenerator::restaurantChain();
        $location = RandomGenerator::restaurantLocation();
        $chain->addLocation($location);

        $locations = $chain->getRestaurantLocations();
        $this->assertEquals($location, end($locations));
    }

    public function testGetter() {
        // mockの呼び出し
        $restaurantChain = $this->mockRestaurantChainTest();

        // test case
        $this->assertEquals(1, $restaurantChain->getChainId());
        $this->assertEquals(array(), $restaurantChain->getRestaurantLocations());
        $this->assertEquals("test cuisineType", $restaurantChain->getCuisineType());
        $this->assertEquals(1, $restaurantChain->getNumberOfLocations());
        $this->assertEquals("test parent company", $restaurantChain->getParentCompany());
    }
}
