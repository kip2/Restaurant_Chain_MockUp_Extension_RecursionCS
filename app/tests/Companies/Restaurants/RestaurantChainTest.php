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

    public function testToMarkdow() {
        $chain = RandomGenerator::restaurantChain();

        $answer = sprintf("## Restaurant Chain : %s
                    - Founding Year: %d
                    - Description: %s
                    - Website: %s
                    - Phone Number: %s
                    - Industory: %s
                    - CEO: %s
                    - Pubcicly Traded: %s
                    - Country: %s
                    - Founder: %s 
                    - Total Employee: %d 
                    - Chain Id: %d 
                    - Restaurant Locations: %s 
                    - Cuisine Type: %s 
                    - Number Of Locatsons: %d 
                    - Parent Company: %s ",
            $chain->getName(),
            $chain->getFoundingYear(),
            $chain->getDescription(),
            $chain->getWebsite(),
            $chain->getPhone(),
            $chain->getIndustory(),
            $chain->getCeo(),
            $chain->getIsPubliclyTraded() ? "Yes" : "No",
            $chain->getCountry(),
            $chain->getFounder(),
            $chain->getTotalEmployees(),
            $chain->getChainId(),
            $chain->locationsToMarkdown(),
            $chain->getCuisineType(),
            $chain->getNumberOfLocations(),
            $chain->getParentCompany()
        );

        $this->assertEquals($answer , $chain->toMarkdown());
    }

    public function testLocationsToMarkdown() {
        $chain = RandomGenerator::restaurantChain();

        $answer = "";
        foreach($chain->getRestaurantLocations() as $location) {
            $answer .= $location->toMarkdown() . "\n";
        }
        $this->assertEquals($answer , $chain->locationsToMarkdown());
    }

    public function testToArray() {
        $chain = RandomGenerator::restaurantChain();

        $answer = [
            "restaurantChainName" => $chain->getName(),
            "foundingYear" => $chain->getFoundingYear(),
            "description" => $chain->getDescription(),
            "website" => $chain->getWebsite(),
            "phoneNumber" => $chain->getPhone(),
            "industory" => $chain->getIndustory(),
            "CEO" => $chain->getCeo(),
            "pubciclyTraded" => $chain->getIsPubliclyTraded() ? "Yes" : "No",
            "country" => $chain->getCountry(),
            "founder" => $chain->getFounder(),
            "totalEmployee" => $chain->getTotalEmployees(),
            "chainId" => $chain->getChainId(),
            "restaurantLocations" => $chain->getRestaurantLocations(),
            "cuisineType" => $chain->getCuisineType(),
            "numberOfLocations" => $chain->getNumberOfLocations(),
            "parentCompany" => $chain->getParentCompany()
        ];

        $this->assertEquals($answer , $chain->toArray());
    }

    public function testPrintRestaurantLocations() {
        $chain = RandomGenerator::restaurantChain();

        $testString = "";
        foreach ($chain->getRestaurantLocations() as $location) {
            $testString .= $location->introduction();
        }
        $this->assertEquals($testString , $chain->printRestaurantLocations());
    }

    public function testIntroduction() {
        $chain = RandomGenerator::restaurantChain();

        $companyIntroduction = "Company name: {$chain->getName()}, ";
        $companyIntroduction .= "Founding year: {$chain->getFoundingYear()}, ";
        $companyIntroduction .= "Description: {$chain->getDescription()}, ";
        $companyIntroduction .= "Our Website URL: {$chain->getWebsite()}, ";
        $companyIntroduction .= "Phone Number: {$chain->getPhone()}, ";
        $companyIntroduction .= "Industory: {$chain->getIndustory()}, ";
        $companyIntroduction .= "CEO: {$chain->getCeo()}, ";
        $companyIntroduction .= "Publicly Traded?: " ;
        $companyIntroduction .= ($chain->getIsPubliclyTraded()) ? "Yes" : "No";
        $companyIntroduction .= "\n";

        $companyIntroduction .= sprintf("Chain ID: {$chain->getChainId()}, ");
        $companyIntroduction .= sprintf("Locations: {$chain->printRestaurantLocations()}, ");
        $companyIntroduction .= sprintf("Cuisine type: {$chain->getCuisineType()}, ");
        $companyIntroduction .= sprintf("Number of Location: {$chain->getNumberOfLocations()}, ");
        $companyIntroduction .= sprintf("Parent company: {$chain->getParentCompany()}");
        $companyIntroduction .= sprintf("\n");

        $this->assertEquals($companyIntroduction, $chain->introduction());
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
