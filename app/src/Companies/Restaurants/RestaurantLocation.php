<?php
namespace Companies\Restaurants;

use FileConverter\FileConvertible;
use Users\Employees\Employee;

class RestaurantLocation implements FileConvertible{

    // 場所の名前
    private string $name;
    // 住所
    private string $address;
    // 市区町村
    private string $city;
    // 州
    private string $state;
    // 郵便番号
    private string $zipCode;
    /** @var Employee[] */
    private array $employees;
    // 現在開いているか
    private bool $isOpen;
    // ドライブスルー可能か
    private bool $hasDriveThru;

    public function __construct( $name, $address, $city, $state, $zipCode, $employees, $isOpen, $hasDriveThru,)
    {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employees = $employees;
        $this->isOpen = $isOpen;
        $this->hasDriveThru = $hasDriveThru;
    }


    /**
     * 会社の簡単な紹介
     *
     * @return string
     */
    public function shortIntroduction():string {
        return sprintf("Company Name:%s Address: %s ZipCode: %s", $this->getName(), sprintf("%s, %s, %s", $this->getAddress(), $this->getCity(), $this->getState()), $this->getZipCode());
    }

    /**
     * locationについての説明文を生成
     *
     * @return string
     */
    public function introduction():string {
        $introduction = " Address: {$this->getName()}, {$this->getAddress()}, {$this->getCity()}, {$this->getState()},  ZipCode: {$this->getZipCode()}, ";
        $introduction .= " Open?: " ;
        $introduction .= ($this->getIsOpen()) ? "Yes" : "No";
        $introduction .= "\n";
        return $introduction;
    }

    /**
     * ダウンロード用txt形式に変換する
     *
     * @return string
     */
    public function toString():string{
        return sprintf("Location: %s\nAddress: %s\nCity: %s\nState: %s\nZipCode: %s\nOpen?: %s\nDriveThru?: %s\nEmployees: %s",
                $this->getName(),
                $this->getAddress(),
                $this->getCity(),
                $this->getState(),
                $this->getZipCode(),
                $this->getIsOpen() ? "Yes" : "No",
                $this->getHasDriveThru() ? "Yes" : "No",
                $this->employeesToString()
        );
    }
    
    /**
     * employeesをテキスト形式に変換する
     *
     * @return string
     */
    public function employeesToString(): string {
        $result = "";
        foreach($this->getEmployees() as $employee) {
            $result .= $employee->toString() . "\n";
        }
        return $result;
    }

    /**
     * HTML形式に変換
     *
     * @return string
     */
    public function toHTML():string{
        return sprintf("<div class='restaurant-location-card'>
                    <div class='d-flex justify-content-center'>
                        <h2>Location is %s</h2>
                    </div>
                    <p>Address: %s</p>
                    <p>City: %s</p>
                    <p>State: %s</p>
                    <p>Zip Code: %s</p>
                    <p>Open?: %s</p>
                    <p>Drive Thru?: %s</p>
                    <div class='d-flex flex-wrap'>%s</div>
                </div>",
                $this->getName(),
                $this->getAddress(),
                $this->getCity(),
                $this->getState(),
                $this->getZipCode(),
                $this->getIsOpen() ? "Yes" : "No",
                $this->getHasDriveThru() ? "Yes" : "No",
                $this->employeesToHTML()
            );
    }

    /**
     * employeesをHTMLの文字列に変換
     *
     * @return string
     */
    public function employeesToHTML(): string {
        $result = "";
        foreach($this->getEmployees() as $employee) {
            $result .= $employee->toHTML() . "\n";
        }
        return $result;
    }

    /**
     * ダウンロード用のmarkdown形式に変換
     *
     * @return string
     */
    public function toMarkdown():string{
        return sprintf("### Name: %s\n - Address: %s\n - City: %s\n - State: %s\n - Zip Code: %s\n - Open?: %s\n - Drive Thru?: %s\n## Employees: \n%s ",
            $this->getName(),
            $this->getAddress(),
            $this->getCity(),
            $this->getState(),
            $this->getZipCode(),
            $this->getIsOpen() ? "Yes" : "No",
            $this->getHasDriveThru() ? "Yes" : "No",
            $this->employeesToMarkdown()
        );
    }

    /**
     * employeesをmarkdownの文字列に変換
     *
     * @return string
     */
    public function employeesToMarkdown():string {
        $result = "";
        foreach($this->getEmployees() as $employee) {
            $result .= $employee->toMarkdown();
        }
        return $result;
    }

    /**
     * JSONダウンロード用の配列を生成
     *
     * @return array
     */
    public function toArray():array{
        return [
            "name" => $this->getName(),
            "address" => $this->getAddress(),
            "city" => $this->getCity(),
            "state" => $this->getState(),
            "zipCode" => $this->getZipCode(),
            "employees" => $this->employeesToArray(),
            "isOpen" => $this->getIsOpen(),
            "hasDriveThru" => $this->getHasDriveThru()
        ];
    }

    /**
     * employeesの配列を、JSON用の配列に変換
     *
     * @return array
     */
    private function employeesToArray():array {
        $employees = array();
        foreach ($this->getEmployees() as $employee) {
            $employees[] = $employee->toArray();
        }
        return $employees;
    }


    // getter setter

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
     * Get the value of address
     *
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param string $address
     *
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param string $city
     *
     * @return self
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of state
     *
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @param string $state
     *
     * @return self
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of zipCode
     *
     * @return string
     */
    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * Set the value of zipCode
     *
     * @param string $zipCode
     *
     * @return self
     */
    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get the value of employees
     *
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * Set the value of employees
     *
     * @param array $employees
     *
     * @return self
     */
    public function setEmployees(array $employees): self
    {
        $this->employees = $employees;

        return $this;
    }

    /**
     * Get the value of isOpen
     *
     * @return bool
     */
    public function getIsOpen(): bool
    {
        return $this->isOpen;
    }

    /**
     * Set the value of isOpen
     *
     * @param bool $isOpen
     *
     * @return self
     */
    public function setIsOpen(bool $isOpen): self
    {
        $this->isOpen = $isOpen;

        return $this;
    }

    /**
     * Get the value of hasDriveThru
     *
     * @return bool
     */
    public function getHasDriveThru(): bool
    {
        return $this->hasDriveThru;
    }

    /**
     * Set the value of hasDriveThru
     *
     * @param bool $hasDriveThru
     *
     * @return self
     */
    public function setHasDriveThru(bool $hasDriveThru): self
    {
        $this->hasDriveThru = $hasDriveThru;

        return $this;
    }
}