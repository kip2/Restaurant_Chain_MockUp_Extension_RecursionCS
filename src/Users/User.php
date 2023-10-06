<?php

require_once __DIR__ . '/../FileConverter/FileConvertible.php';

class User implements FileConvertible{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $hashedPassword;
    private string $phoneNumber;
    private string $address;
    private DateTime $birthDate;
    private DateTIme $membershipExpirationDate;
    private string $role;

    // --------------------------------------------------
    // method
    // --------------------------------------------------

    public function __construct( $id, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role,){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->membershipExpirationDate = $membershipExpirationDate;
        $this->role = $role;
    }

    // todo: 各メソッドの動作を把握する
    public function login(string $password) {
    }

    public function updateProfile(string $address, string $phoneNumber) {

    }
    public function renewMembership(DateTime $expirationDate) {

    }
    public function changePassword(string $newPassword) {

    }
    public function hasMembershipExpired() {

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

    public function getId():int  {
        return $this->id;
    }
    public function getFirstName():string  {
        return $this->firstName;
    }
    public function getLastName():string  {
        return $this->lastName;
    }
    public function getEmail():string  {
        return $this->email;
    }
    public function getHashedPassword():string  {
        return $this->hashedPassword;
    }
    public function getPhoneNumber():string  {
        return $this->phoneNumber;
    }
    public function getAddress():string  {
        return $this->address;
    }
    public function getBirthDate():DateTime  {
        return $this->birthDate;
    }
    public function getMembershipExpirationDate():DateTIme  {
        return $this->membershipExpirationDate;
    }
    public function getRole():string  {
        return $this->role;
    }

}