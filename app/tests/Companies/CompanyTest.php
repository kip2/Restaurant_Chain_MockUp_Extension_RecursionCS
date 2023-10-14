<?php

// require __DIR__ . '/vendor/autoload.php';

// // autoloader設定
// spl_autoload_extensions(".php");
// spl_autoload_register(function ($class) {
//     $base_dir = __DIR__ . '/../src/';
//     $file = $base_dir . str_replace('\\', '/', $class) . '.php';
//     if (file_exists($file)) {
//         require $file;
//     }
// });

require_once __DIR__ . '/../../src/Companies/Company.php';
require_once __DIR__ . '/../../src/Helpers/RandomGenerator.php';

use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase {


    private function mockCompany() {
        $name = "company1";
        $foundingYear = 1;
        $description = "company1 is a company.";
        $website = "http://test.com";
        $phone = "090-0000-9999";
        $industory = "maker";
        $ceo = "John Doe";
        $isPubliclyTraded = True;
        $country = "country1";
        $founder = "Gonbee";
        $totalEmployees = 10;

        $company = new Company(
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
        );
        return $company;
    }

    public function testToString() {
        $company = RandomGenerator::company();

        $answer = sprintf("Company: %s\n,
                    Founding Year: %d\n,
                    Description: %s\n,
                    Website: %s\n,
                    Phone Number: %s\n,
                    Industory: %s\n,
                    CEO: %s\n,
                    Is pubcicly traded?: %s\n,
                    Country: %s\n,
                    Founder: %s\n,
                    Total Employees: %d\n
                    ",
            $company->getName(),
            $company->getFoundingYear(),
            $company->getDescription(),
            $company->getWebsite(),
            $company->getPhone(),
            $company->getIndustory(),
            $company->getCeo(),
            $company->getIsPubliclyTraded() ? "Yes" : "No",
            $company->getCountry(),
            $company->getFounder(),
            $company->getTotalEmployees()
        );

        $this->assertEquals($answer, $company->toString());
    }

    public function testToMarkdown() {
        $company = RandomGenerator::company();

        $answer =  sprintf("## Company: %s,
                    - Founding Year: %d,
                    - Description: %s,
                    - Website: %s,
                    - Phone Number: %s,
                    - Industory: %s,
                    - CEO: %s,
                    - Is pubcicly traded?: %s,
                    - Country: %s,
                    - Founder: %s,
                    - Total Employees: %d",
            $company->getName(),
            $company->getFoundingYear(),
            $company->getDescription(),
            $company->getWebsite(),
            $company->getPhone(),
            $company->getIndustory(),
            $company->getCeo(),
            $company->getIsPubliclyTraded() ? "Yes" : "No",
            $company->getCountry(),
            $company->getFounder(),
            $company->getTotalEmployees()
        );

        $this->assertEquals($answer, $company->toMarkdown());
    }

    public function testToArray() {
        $company = RandomGenerator::company();

        $answer = [
            "companyName" => $company->getName(),
            "foundingYear" => $company->getFoundingYear(),
            "description" => $company->getDescription(),
            "website" => $company->getWebsite(),
            "phoneNumber" => $company->getPhone(),
            "industory" => $company->getIndustory(),
            "CEO" => $company->getCeo(),
            "pubciclyTraded" => $company->getIsPubliclyTraded() ? "Yes" : "No",
            "country" => $company->getCountry(),
            "founder" => $company->getFounder(),
            "totalEmployee" => $company->getTotalEmployees()
        ];

        $this->assertEquals($answer, $company->toArray());
    }

    public function testIntroduction() {
        $company = $this->mockCompany();

        $introduction = "Company name: {$company->getName()}, ";
        $introduction .= "Founding year: {$company->getFoundingYear()}, ";
        $introduction .= "Description: {$company->getDescription()}, ";
        $introduction .= "Our Website URL: {$company->getWebsite()}, ";
        $introduction .= "Phone Number: {$company->getPhone()}, ";
        $introduction .= "Industory: {$company->getIndustory()}, ";
        $introduction .= "CEO: {$company->getCeo()}, ";
        $introduction .= "Publicly Traded?: " ;
        $introduction .= ($company->getFoundingYear()) ? "Yes" : "No";
        $introduction .= "\n";

        $this->assertEquals($introduction, $company->introduction());
    }

    public function testGetter() {
        $company = $this->mockCompany();
        
        // getter
        $this->assertEquals("company1", $company->getName());
        $this->assertEquals(1, $company->getFoundingYear());
        $this->assertEquals("company1 is a company.", $company->getDescription());
        $this->assertEquals("http://test.com", $company->getWebsite());
        $this->assertEquals("090-0000-9999", $company->getPhone());
        $this->assertEquals("maker", $company->getIndustory());
        $this->assertEquals("John Doe", $company->getCeo());
        $this->assertEquals(True, $company->getIsPubliclyTraded());
        $this->assertEquals("country1", $company->getCountry());
        $this->assertEquals("Gonbee", $company->getFounder());
        $this->assertEquals(10, $company->getTotalEmployees());
    }

}