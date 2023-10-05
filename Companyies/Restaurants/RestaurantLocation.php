<?php

class RestaurantLocation {

    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    // todo: Employeeクラスの配列である宣言に修正する必要ある
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

}