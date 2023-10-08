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

    public function introduction():string {
        $introduction = "Company name: {$this->getName()}, ";
        $introduction .= "Founding year: {$this->getFoundingYear()}, ";
        $introduction .= "Description: {$this->getDescription()}, ";
        $introduction .= "Our Website URL: {$this->getWebsite()}, ";
        $introduction .= "Phone Number: {$this->getPhone()}, ";
        $introduction .= "Industory: {$this->getIndustory()}, ";
        $introduction .= "CEO: {$this->getCeo()}, ";
        $introduction .= "Publicly Traded?: ";
        $introduction .= ($this->getIsPubliclyTraded()) ? "Yes" : "No";
        
        return $introduction;
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



    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of foundingYear
     *
     * @return int
     */
    public function getFoundingYear(): int
    {
        return $this->foundingYear;
    }

    /**
     * Set the value of foundingYear
     *
     * @param int $foundingYear
     *
     * @return self
     */
    public function setFoundingYear(int $foundingYear): self
    {
        $this->foundingYear = $foundingYear;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of website
     *
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * Set the value of website
     *
     * @param string $website
     *
     * @return self
     */
    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get the value of phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param string $phone
     *
     * @return self
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of industory
     *
     * @return string
     */
    public function getIndustory(): string
    {
        return $this->industory;
    }

    /**
     * Set the value of industory
     *
     * @param string $industory
     *
     * @return self
     */
    public function setIndustory(string $industory): self
    {
        $this->industory = $industory;

        return $this;
    }

    /**
     * Get the value of ceo
     *
     * @return string
     */
    public function getCeo(): string
    {
        return $this->ceo;
    }

    /**
     * Set the value of ceo
     *
     * @param string $ceo
     *
     * @return self
     */
    public function setCeo(string $ceo): self
    {
        $this->ceo = $ceo;

        return $this;
    }

    /**
     * Get the value of isPubliclyTraded
     *
     * @return bool
     */
    public function getIsPubliclyTraded(): bool
    {
        return $this->isPubliclyTraded;
    }

    /**
     * Set the value of isPubliclyTraded
     *
     * @param bool $isPubliclyTraded
     *
     * @return self
     */
    public function setIsPubliclyTraded(bool $isPubliclyTraded): self
    {
        $this->isPubliclyTraded = $isPubliclyTraded;

        return $this;
    }

    /**
     * Get the value of country
     *
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @param string $country
     *
     * @return self
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of founder
     *
     * @return string
     */
    public function getFounder(): string
    {
        return $this->founder;
    }

    /**
     * Set the value of founder
     *
     * @param string $founder
     *
     * @return self
     */
    public function setFounder(string $founder): self
    {
        $this->founder = $founder;

        return $this;
    }

    /**
     * Get the value of totalEmployees
     *
     * @return int
     */
    public function getTotalEmployees(): int
    {
        return $this->totalEmployees;
    }

    /**
     * Set the value of totalEmployees
     *
     * @param int $totalEmployees
     *
     * @return self
     */
    public function setTotalEmployees(int $totalEmployees): self
    {
        $this->totalEmployees = $totalEmployees;

        return $this;
    }
}