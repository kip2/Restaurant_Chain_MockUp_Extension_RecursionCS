<?php

require_once __DIR__ . '/../../FileConverter/FileConvertible.php';
require_once __DIR__ . '/../Company.php';

class RestaurantChain extends Company implements FileConvertible{

    private int $chainId;
    // todo: RestaurantLocationの配列として宣言する必要がある
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

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
        $chainId,
        $restaurantLocations,
        $cuisineType,
        $numberOfLocations,
        $parentCompany,
    ) {
        parent::__construct( $name, $foundingYear, $description, $website, $phone, $industory, $ceo, $isPubliclyTraded, $country, $founder, $totalEmployees,);
        $this->chainId = $chainId;
        $this->restaurantLocations = $restaurantLocations;
        $this->cuisineType = $cuisineType;
        $this->numberOfLocations = $numberOfLocations;
        $this->parentCompany = $parentCompany;
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
    public function getChainId():int{
        return $this->chainId;
    }
    public function getRestaurantLocations():array{
        return $this->restaurantLocations;
    }
    public function getCuisineType():string{
        return $this->cuisineType;
    }
    public function getNumberOfLocations():int{
        return $this->numberOfLocations;
    }
    public function getParentCompany():string{
        return $this->parentCompany;
    }
}