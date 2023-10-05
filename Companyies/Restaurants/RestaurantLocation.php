<?php

// todo: FileConvetibleの読み込み

class RestaurantLocation implements FileConvertible{

    private string $name;
    private string $address;
    private string $city;
    private string $state;
    private string $zipCode;
    // todo: Employeeクラスの配列である宣言に修正する必要ある
    private array $employees;
    private bool $isOpen;
    private bool $hasDriveThru;

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