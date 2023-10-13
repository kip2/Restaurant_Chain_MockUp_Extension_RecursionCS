<?php
use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php'; 

require_once __DIR__ . '/../../../src/Users/Employees/Employee.php';

class EmployeeTest extends TestCase {

    private function mockEmployee() {
        $id = 1;
        $firstName = "test firstName";
        $lastName = "test lastName";
        $email = "test@example.com";
        $hashedPassword = "test password";
        $phoneNumber = "090-0000-9999";
        $address = "test address";
        $birthDate = new DateTime("2023-05-15 18:00:00");
        $membershipExpirationDate = new DateTime("2023-05-15 18:00:00");
        $role = "test role";
        $jobTitle = "test jobTitle";
        $salary = 3.0;
        $startDate = new DateTime("2023-05-15 18:00:00");
        $awards = array("test", "test2");

        $employee = new Employee( $id, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role, $jobTitle, $salary, $startDate, $awards);

        return $employee;

    }



    
    public function testGetter() {
        $employee = $this->mockEmployee();
        $this->assertEquals("test jobTitle", $employee->getJobTitle());
        $this->assertEquals(3.0, $employee->getSalary());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $employee->getStartDate());
        $this->assertEquals(array("test", "test2"), $employee->getAwards());
    }
}