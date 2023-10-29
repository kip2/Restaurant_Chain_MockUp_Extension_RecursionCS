<?php
namespace Companies\Restaurants;

use FileConverter\FileConvertible;
use Companies\Company;

class RestaurantChain extends Company implements FileConvertible{

    private int $chainId;
    /** @var RestaurantLocation[] */
    private array $restaurantLocations = [];
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

    /**
     * ダウンロードtxt用文字列を生成
     *
     * @return string
     */
    public function toString():string{
        return sprintf("Restaurant Chain Name: %s\nFounding Year: %d\nDescription: %s\nWebSite: %s\nPhone Number: %s\nIndustory: %s\nCEO: %s\nPublicly Traded: %s\nCountry: %s\nFounder: %s\nTotal Employees: %d\nChain ID: %d\nRestaurant Locations: \n%s\nCuisine Type: %s\nNumber Of Locations: %d\nParent Company: %s\n
        ",
            $this->getName(),
            $this->getFoundingYear(),
            $this->getDescription(),
            $this->getWebsite(),
            $this->getPhone(),
            $this->getIndustory(),
            $this->getCeo(),
            $this->getIsPubliclyTraded() ? "Yes" : "No",
            $this->getCountry(),
            $this->getFounder(),
            $this->getTotalEmployees(),
            $this->getChainId(),
            $this->locationsToString(),
            $this->getCuisineType(),
            $this->getNumberOfLocations(),
            $this->getParentCompany()
        );
    }

    /**
     * restaurantLocationsをstringに変換する
     *
     * @return string
     */
    public function locationsToString() :string{
        $result = "";
        foreach($this->getRestaurantLocations() as $location) {
            $result .= $location->toString() . "\n";
        }
        return $result;
    }

    /**
     * HTMLファイルに変換する
     *
     * @return string
     */
    public function toHTML():string{
        return sprintf("<div class='restaurant-chain-card'>
                    <div class='d-flex justify-content-center'>
                        <h1> 🏢 Company: %s 🏢 </h1>
                    </div>
                    <p>FoundingYear: %d</p>
                    <p>Description: %s</p>
                    <p>Website: %s</p>
                    <p>Phone-Number: %s</p>
                    <p>Industory: %s</p>
                    <p>CEO: %s</p>
                    <p>Publicly Traded: %s</p>
                    <p>Country: %s</p>
                    <p>Founder: %s</p>
                    <p>Total Employees: %d</p>
                    <p>Restaurant Chain ID: %d</p>
                    <p>Cuisine Type: %s</p>
                    <p>Number Of Locations: %d</p>
                    <p>Parent Company: %s</p>
                    <div>%s</div>
                </div>
                <br/>",
            $this->getName(),
            $this->getFoundingYear(),
            $this->getDescription(),
            $this->getWebsite(),
            $this->getPhone(),
            $this->getIndustory(),
            $this->getCeo(),
            $this->getIsPubliclyTraded() ? "Yes" : "No",
            $this->getCountry(),
            $this->getFounder(),
            $this->getTotalEmployees(),
            $this->getChainId(),
            $this->getCuisineType(),
            $this->getNumberOfLocations(),
            $this->getParentCompany(),
            $this->locationsToHTML()
        );
    }
    /**
     * restaurantLocationsをHTMLに変換する
     *
     * @return string
     */
    public function locationsToHTML() :string{
        $result = "";
        foreach($this->getRestaurantLocations() as $location) {
            $result .= $location->toHTML() . "\n";
        }
        return $result;
    }
    
    /**
     * ダウンロード用markdownを生成する
     *
     * @return string
     */
    public function toMarkdown():string{
        return sprintf("## Restaurant Chain : %s
                    - Founding Year: %d
                    - Description: %s
                    - Website: %s
                    - Phone Number: %s
                    - Industory: %s
                    - CEO: %s
                    - Pubcicly Traded: %s
                    - Country: %s
                    - Founder: %s 
                    - Total Employee: %d 
                    - Chain Id: %d 
                    - Restaurant Locations: %s 
                    - Cuisine Type: %s 
                    - Number Of Locatsons: %d 
                    - Parent Company: %s ",
            $this->getName(),
            $this->getFoundingYear(),
            $this->getDescription(),
            $this->getWebsite(),
            $this->getPhone(),
            $this->getIndustory(),
            $this->getCeo(),
            $this->getIsPubliclyTraded() ? "Yes" : "No",
            $this->getCountry(),
            $this->getFounder(),
            $this->getTotalEmployees(),
            $this->getChainId(),
            $this->locationsToMarkdown(),
            $this->getCuisineType(),
            $this->getNumberOfLocations(),
            $this->getParentCompany()
        );
    }

    /**
     * restaurantLocationsをmarkdownに変換する
     *
     * @return string
     */
    public function locationsToMarkdown() :string{
        $result = "";
        foreach($this->getRestaurantLocations() as $location) {
            $result .= $location->toMarkdown() . "\n";
        }
        return $result;
    }
    
    /**
     * ダウンロード用JSONのための配列を生成
     *
     * @return array
     */
    public function toArray():array{
        return [
            "restaurantChainName" => $this->getName(),
            "foundingYear" => $this->getFoundingYear(),
            "description" => $this->getDescription(),
            "website" => $this->getWebsite(),
            "phoneNumber" => $this->getPhone(),
            "industory" => $this->getIndustory(),
            "CEO" => $this->getCeo(),
            "pubciclyTraded" => $this->getIsPubliclyTraded() ? "Yes" : "No",
            "country" => $this->getCountry(),
            "founder" => $this->getFounder(),
            "totalEmployee" => $this->getTotalEmployees(),
            "chainId" => $this->getChainId(),
            "restaurantLocations" => $this->getRestaurantLocations(),
            "cuisineType" => $this->getCuisineType(),
            "numberOfLocations" => $this->getNumberOfLocations(),
            "parentCompany" => $this->getParentCompany()
        ];
    }


    /**
     * 紹介用文章を生成
     *
     * @return string
     */
    public function introduction():string {
        $introduction = parent::introduction();

        $introduction .= sprintf("Chain ID: {$this->getChainId()}, ");
        $introduction .= sprintf("Locations: {$this->printRestaurantLocations()}, ");
        $introduction .= sprintf("Cuisine type: {$this->getCuisineType()}, ");
        $introduction .= sprintf("Number of Location: {$this->getNumberOfLocations()}, ");
        $introduction .= sprintf("Parent company: {$this->getParentCompany()}");
        $introduction .= sprintf("\n");

        return $introduction;
    }

    /**
     * restaurantLocationを全て文章化する
     *
     * @return string
     */
    public function printRestaurantLocations() :string{
        $locations = "";
        foreach ($this->getRestaurantLocations() as $location) {
            $locations .= $location->introduction();
        }
        return $locations;
    }

    /**
     * RestaurantLocationを追加する
     *
     * @param RestaurantLocation $location
     * @return void
     */
    public function addLocation(RestaurantLocation $location):void {
        array_push($this->restaurantLocations, $location);
    }
    

    /**
     * Get the value of chainId
     *
     * @return int
     */
    public function getChainId(): int
    {
        return $this->chainId;
    }

    /**
     * Set the value of chainId
     *
     * @param int $chainId
     *
     * @return self
     */
    public function setChainId(int $chainId): self
    {
        $this->chainId = $chainId;

        return $this;
    }

    /**
     * Get the value of restaurantLocations
     *
     * @return array
     */
    public function getRestaurantLocations(): array
    {
        return $this->restaurantLocations;
    }

    /**
     * Set the value of restaurantLocations
     *
     * @param array $restaurantLocations
     *
     * @return self
     */
    public function setRestaurantLocations(array $restaurantLocations): self
    {
        $this->restaurantLocations = $restaurantLocations;

        return $this;
    }

    /**
     * Get the value of cuisineType
     *
     * @return string
     */
    public function getCuisineType(): string
    {
        return $this->cuisineType;
    }

    /**
     * Set the value of cuisineType
     *
     * @param string $cuisineType
     *
     * @return self
     */
    public function setCuisineType(string $cuisineType): self
    {
        $this->cuisineType = $cuisineType;

        return $this;
    }

    /**
     * Get the value of numberOfLocations
     *
     * @return int
     */
    public function getNumberOfLocations(): int
    {
        return $this->numberOfLocations;
    }

    /**
     * Set the value of numberOfLocations
     *
     * @param int $numberOfLocations
     *
     * @return self
     */
    public function setNumberOfLocations(int $numberOfLocations): self
    {
        $this->numberOfLocations = $numberOfLocations;

        return $this;
    }

    /**
     * Get the value of parentCompany
     *
     * @return string
     */
    public function getParentCompany(): string
    {
        return $this->parentCompany;
    }

    /**
     * Set the value of parentCompany
     *
     * @param string $parentCompany
     *
     * @return self
     */
    public function setParentCompany(string $parentCompany): self
    {
        $this->parentCompany = $parentCompany;

        return $this;
    }
}