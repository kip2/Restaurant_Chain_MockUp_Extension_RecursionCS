<?php

require_once __DIR__ . '/../../FileConverter/FileConvertible.php';
require_once __DIR__ . '/../../Users/Employees/Employee.php';

class RestaurantLocation implements FileConvertible{

    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    /** @var Employee[] */
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

    public function __construct( $name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru,)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
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