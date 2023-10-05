<?php

// todo: Companyの読み込み
// todo: FileConvetibleの読み込み

class RestaurantChain extends Company implements FileConvertible{

    private int $chainId;
    // todo: RestaurantLocationの配列として宣言する必要がある
    private array $restaurantLocations;
    private string $cuisineType;
    private int $numberOfLocations;
    private string $parentCompany;

    // todo: 親のコンストラクタに明示的に渡すこと
    public function __construct() {
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