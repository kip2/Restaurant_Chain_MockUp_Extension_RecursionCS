<?php
use PHPUnit\Framework\TestCase;
require 'vendor/autoload.php'; 

require_once __DIR__ . '/../../../src/Users/Employees/Employee.php';
require_once __DIR__ . '/../../../src/Helpers/RandomGenerator.php';

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

    public function testToString() {
        $employee = RandomGenerator::employee();

        $answer = sprintf("Employee ID: %d\n
        Name: %s %s\n
        Email: %s\n
        Phone Number: %s\n
        Address: %s\n
        Birth Date: %s\n
        Role: %s\n
        Job Titile: %s\n
        Salary: %.2f\n
        Start Date: %s\n
        awards: %s\n
        ",
            $employee->getId(),
            $employee->getFirstName(),
            $employee->getLastName(),
            $employee->getEmail(),
            $employee->getPhoneNumber(),
            $employee->getAddress(),
            $employee->getBirthDate()->format('Y-m-d'),
            $employee->getRole(),
            $employee->getJobTitle(),
            $employee->getSalary(),
            $employee->getStartDate()->format('Y-m-d'),
            $employee->getJobTitle(),
            $employee->toStringAwards()
        );

        $this->assertEquals($answer, $employee->toString());
    }

    public function testToStringAwards() {
        $mock = $this->mockEmployee();

        $this->assertEquals("test, test2.\n", $mock->toStringAwards());
    }
    
    public function testGetter() {
        $employee = $this->mockEmployee();
        $this->assertEquals("test jobTitle", $employee->getJobTitle());
        $this->assertEquals(3.0, $employee->getSalary());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $employee->getStartDate());
        $this->assertEquals(array("test", "test2"), $employee->getAwards());
    }
}