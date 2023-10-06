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

require_once __DIR__ . '/../src/Companies/Company.php';

use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase {
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
        
        // getter
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
    }
}