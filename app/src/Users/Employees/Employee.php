<?php

require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../../FileConverter/FileConvertible.php';

class Employee extends User implements FileConvertible{

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
        return sprintf("Employee ID: %d\n
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
            $this->id,
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phoneNumber,
            $this->address,
            $this->birthDate->format('Y-m-d'),
            $this->role,
            $this->jobTitle,
            $this->salary,
            $this->startDate->format('Y-m-d'),
            $this->jobTitle,
        );
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

    public function toStringAwards():string {
        $result = "";
        $lenAwards = count($this->getAwards());
        foreach ($this->getAwards() as $index => $award) {
            $result .= $award;

            if ($index < $lenAwards - 1) {
                $result .= ", ";
            } else {
                $result .= ".\n";
            }
        }
        return $result;
    }

    /**
     * 自己紹介用の文を生成する
     *
     * @return string
     */
    public function introduction() : string{
        // $employeeString = parent::introduction();
        $employeeString = sprintf("ID:%d, jobTitle: %s, salary: %.2f, startDate: %s", $this->getId(), $this->getJobTitle(), $this->getSalary(), $this->getStartDate()->format('Y-m-d') );
        return $employeeString;
    }
    

    /**
     * Get the value of jobTitle
     *
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * Set the value of jobTitle
     *
     * @param string $jobTitle
     *
     * @return self
     */
    public function setJobTitle(string $jobTitle): self
    {
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * Get the value of salary
     *
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @param float $salary
     *
     * @return self
     */
    public function setSalary(float $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of startDate
     *
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @param DateTime $startDate
     *
     * @return self
     */
    public function setStartDate(DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get the value of awards
     *
     * @return array
     */
    public function getAwards(): array
    {
        return $this->awards;
    }

    /**
     * Set the value of awards
     *
     * @param array $awards
     *
     * @return self
     */
    public function setAwards(array $awards): self
    {
        $this->awards = $awards;

        return $this;
    }
}