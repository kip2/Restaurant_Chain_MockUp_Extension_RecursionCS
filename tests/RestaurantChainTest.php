<?php

require_once __DIR__ . '/../src/Companies/Restaurants/RestaurantChain.php';

use PHPUnit\Framework\TestCase;

class RestaurantChainTest extends TestCase {
    
    public function testGetter() {
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


        $company = new RestaurantChain(
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

        // company getter test
        $this->assertEquals("name test", $company->getName());
        $this->assertEquals(1, $company->getFoundingYear());
        $this->assertEquals("test description", $company->getDescription());
        $this->assertEquals("http://test.com", $company->getWebsite());
        $this->assertEquals("090-0000-9999", $company->getPhone());
        $this->assertEquals("test industory", $company->getIndustory());
        $this->assertEquals("test CEO", $company->getCeo());
        $this->assertEquals(True, $company->getIsPubliclyTraded());
        $this->assertEquals("test country", $company->getCountry());
        $this->assertEquals("test founder", $company->getFounder());
        $this->assertEquals(10, $company->getTotalEmployees());

        // restaurantChain test
        $this->assertEquals(1, $company->getChainId());
        $this->assertEquals(array(), $company->getRestaurantLocations());
        $this->assertEquals("test cuisineType", $company->getCuisineType());
        $this->assertEquals(1, $company->getNumberOfLocations());
        $this->assertEquals("test parent company", $company->getParentCompany());

    }
}
