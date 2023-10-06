<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../FileConverter/FileConvertible.php';

class Emloyee extends User implements FileConvertible{

    private string $jobTitle;
    private float $salary;
    // todo: DateTImeの依存解消
    private DateTime $startDate;
    // todo: string arrayの宣言方法
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
}