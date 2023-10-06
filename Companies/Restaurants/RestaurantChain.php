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

    // todo: 親のコンストラクタに明示的に渡すこと
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
}