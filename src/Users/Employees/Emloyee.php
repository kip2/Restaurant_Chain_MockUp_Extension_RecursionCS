<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../FileConverter/FileConvertible.php';

class Emloyee extends User implements FileConvertible{

    private string $jobTitle;
    private float $salary;
    private DateTime $startDate;
    /** @var string[] */
    private array $awards;

    public function __construct(
        $id,
        $firstName,
        $lastName,
        $email,
        $hashedPassword,
        $phoneNumber,
        $address,
        $birthDate,
        $membershipExpirationDate,
        $role,
        $jobTitle,
        $salary,
        $startDate,
        $awards
    ){
        parent::__construct( $id, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role);
        $this->jobTitle = $jobTitle;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->awards = $awards;
    } 

    public function toString():string{
        return "";
    }
    public function toHTML():string{
        return "";
    }
    public function toMarkdown():string{
        return "";
    }
    public function toArray():array{
        return array();
    }

    // getter
    public function getJobTitle() : string {
        return $this->jobTitle;
    }
    public function getSalary() : float {
        return $this->salary;
    }
    public function getStartDate() : DateTime {
        return $this->startDate;
    }
    public function getAwards() : array {
        return $this->awards;
    }
}