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

    public function testToArray() {
        $employee = RandomGenerator::employee();

        $answer =  [
            "id" => $employee->getId(),
            "firstName" => $employee->getFirstName(),
            "lastName" => $employee->getLastName(),
            "email" => $employee->getEmail(),
            "password" => $employee->getHashedPassword(),
            "phoneNumber" => $employee->getPhoneNumber(),
            "address" => $employee->getAddress(),
            "birthDate" => $employee->getBirthDate(),
            "role" => $employee->getRole(),
            "jobTitle" => $employee->getJobTitle(),
            "salary" => $employee->getSalary(),
            "startDate" => $employee->getStartDate(),
            "awards" => $employee->toStringAwards(),
        ];

        $this->assertEquals($answer, $employee->toArray());
    }

    public function testToMarkDown() {

        $employee = RandomGenerator::employee();

        $answer =  sprintf("## Employee: %s %s
                    - Email: %s
                    - Phone Number: %s
                    - Address: %s
                    - Birth Date: %s
                    - Role: %s
                    - Job Titile: %s
                    - Salary: %.2f
                    - Start Date: %s
                    - Awards: %s ",
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

        $this->assertEquals($answer, $employee->toMarkdown());
    }

    public function testToHTML() {
        $employee = RandomGenerator::employee();

        $answer = sprintf("<div class='employee-card'>
                    <div class='avatar'>Employee ID:%d</div>
                    <h2>%s %s</h2>
                    <p>%s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>Birth Date: %s</p>
                    <p>Role: %s</p>
                    <p>Job Titile: %s</p>
                    <p>Salary: %.2f</p>
                    <p>Start Date: %s</p>
                    <p>Awards: %s</p>
                </div>",
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

        $this->assertEquals($answer, $employee->toHTML());
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