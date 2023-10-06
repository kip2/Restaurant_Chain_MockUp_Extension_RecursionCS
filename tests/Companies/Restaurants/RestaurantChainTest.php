<?php

require_once __DIR__ . '/../../../src/Companies/Restaurants/RestaurantChain.php';

use PHPUnit\Framework\TestCase;

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

    public function testGetter() {
        $restaurantChain = $this->mockRestaurantChainTest();

        // company getter test
        $this->assertEquals("name test", $restaurantChain->getName());
        $this->assertEquals(1, $restaurantChain->getFoundingYear());
        $this->assertEquals("test description", $restaurantChain->getDescription());
        $this->assertEquals("http://test.com", $restaurantChain->getWebsite());
        $this->assertEquals("090-0000-9999", $restaurantChain->getPhone());
        $this->assertEquals("test industory", $restaurantChain->getIndustory());
        $this->assertEquals("test CEO", $restaurantChain->getCeo());
        $this->assertEquals(True, $restaurantChain->getIsPubliclyTraded());
        $this->assertEquals("test country", $restaurantChain->getCountry());
        $this->assertEquals("test founder", $restaurantChain->getFounder());
        $this->assertEquals(10, $restaurantChain->getTotalEmployees());

        // restaurantChain getter test
        $this->assertEquals(1, $restaurantChain->getChainId());
        $this->assertEquals(array(), $restaurantChain->getRestaurantLocations());
        $this->assertEquals("test cuisineType", $restaurantChain->getCuisineType());
        $this->assertEquals(1, $restaurantChain->getNumberOfLocations());
        $this->assertEquals("test parent company", $restaurantChain->getParentCompany());

    }
}
