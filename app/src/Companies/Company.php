<?php

namespace Companies;

use FileConverter\FileConvertible;

class Company implements FileConvertible{
    // 会社の名前
    private string $name;
    // 設立年
    private int $foundingYear;
    // 会社についての説明
    private string $description;
    // websiteのURL
    private string $website;
    // 電話番号
    private string $phone;
    // 業種
    private string $industory;
    // CEOの名前
    private string $ceo;
    // 公開取引されているか
    private bool $isPubliclyTraded;
    // 国
    private string $country;
    // 創設者
    private string $founder;
    // 従業員数
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

    /**
     * 会社名の紹介文を生成
     *
     * @return string
     */
    public function introductionName():string {
        return sprintf("Company Name:%s", $this->getName());
    }

    /**
     * 自己紹介用の文章を生成
     *
     * @return string
     */
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
        $introduction .= "\n";

        return $introduction;
    }

    /**
     * ダウンロード用の文字列を生成する
     *
     * @return string
     */
    public function toString():string{
        return sprintf("Company: %s\n,
                    Founding Year: %d\n,
                    Description: %s\n,
                    Website: %s\n,
                    Phone Number: %s\n,
                    Industory: %s\n,
                    CEO: %s\n,
                    Is pubcicly traded?: %s\n,
                    Country: %s\n,
                    Founder: %s\n,
                    Total Employees: %d\n
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
            $this->getTotalEmployees()
        );
    }

    public function toHTML():string{
        return sprintf("<div class='company-card'>
                    <div class='company'></div>
                    <h2>Company Name: %s</h2>
                    <p>Founding Year: %s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>Industory: %s</p>
                    <p>CEO: %s</p>
                    <p></p>
                    <p>Country: %s</p>
                    <p>Founder: %s</p>
                    <p>Total Employees: %d</p>
                </div>",
                $this->getName(),
                $this->getFoundingYear(),
                $this->getDescription(),
                $this->getWebsite(),
                $this->getPhone(),
                $this->getIndustory(),
                $this->getCeo(),
                $this->getIsPubliclyTraded() ? "Publicly traded" : "Not Publicly traded",
                $this->getCountry(),
                $this->getFounder(),
                $this->getTotalEmployees()
            );
    }

    /**
     * ダウンロード用のmarkdownを生成する
     *
     * @return string
     */
    public function toMarkdown():string{
        return sprintf("## Company: %s,
                    - Founding Year: %d,
                    - Description: %s,
                    - Website: %s,
                    - Phone Number: %s,
                    - Industory: %s,
                    - CEO: %s,
                    - Is pubcicly traded?: %s,
                    - Country: %s,
                    - Founder: %s,
                    - Total Employees: %d",
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
            $this->getTotalEmployees()
        );
    }

    /**
     * ダウンロード用配列を生成する
     *
     * @return array
     */
    public function toArray():array{
        return [
            "companyName" => $this->getName(),
            "foundingYear" => $this->getFoundingYear(),
            "description" => $this->getDescription(),
            "website" => $this->getWebsite(),
            "phoneNumber" => $this->getPhone(),
            "industory" => $this->getIndustory(),
            "CEO" => $this->getCeo(),
            "pubciclyTraded" => $this->getIsPubliclyTraded() ? "Yes" : "No",
            "country" => $this->getCountry(),
            "founder" => $this->getFounder(),
            "totalEmployee" => $this->getTotalEmployees()
        ];
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