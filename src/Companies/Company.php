<?php

require_once __DIR__ . '/../FileConverter/FileConvertible.php';

class Company implements FileConvertible{
    private string $name;
    private int $foundingYear;
    private string $description;
    private string $website;
    private string $phone;
    private string $industory;
    private string $ceo;
    private bool $isPubliclyTraded;
    private string $country;
    private string $founder;
    private int $totalEmployees;

    public function __construct(
        $name,
        $foundingYear,
        $description,
        $website,
        $phone,
        $industory,
        $ceo,
        $isPubliclyTraded,
        $country,
        $founder,
        $totalEmployees,
    ){
        $this->name = $name;
        $this->foundingYear = $foundingYear;
        $this->description = $description;
        $this->website = $website;
        $this->phone = $phone;
        $this->industory = $industory;
        $this->ceo = $ceo;
        $this->isPubliclyTraded = $isPubliclyTraded;
        $this->country = $country;
        $this->founder = $founder;
        $this->totalEmployees = $totalEmployees;
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

    public function getName(): string {
        return $this->name;
    }
    public function getFoundingYear() : int{
        return $this->foundingYear;

    }
    public function getDescription() :string {
        return $this->description;
    }

    public function getWebsite() :string {
        return $this->website;
    }

    
    public function getPhone() :string {
        return $this->phone;
    }

    
    public function getIndustory() :string {
        return $this->industory;
    }

    
    public function getCeo() :string {
        return $this->ceo;

    }
    public function getIsPubliclyTraded() :bool {
        return $this->isPubliclyTraded;

    }
    public function getCountry() :string {
        return $this->country;

    }
    public function getFounder() :string {
        return $this->founder;

    }
    public function getTotalEmployees() :int {
        return $this->totalEmployees;

    }

}