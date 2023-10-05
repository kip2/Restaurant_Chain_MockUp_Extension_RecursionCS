<?php

// todo: FileConvetibleの読み込み

class Company implements FileConvertible{
    private string $name;
    private int $foudingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industory;
    private string $ceo;
    private bool $isPubliclyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

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