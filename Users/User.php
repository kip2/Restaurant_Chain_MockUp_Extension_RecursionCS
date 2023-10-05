<?php

// todo: FileConvertibleの読み込み

class User implements FileConvertible{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $hashedPassword;
    private string $phoneNumber;
    private string $address;
    // todo: DateTimeの依存関係解消
    private DateTime $birthDate;
    // todo: DateTimeの依存関係解消
    private DateTIme $membershipExpirationDate;
    private string $role;

    // --------------------------------------------------
    // method
    // --------------------------------------------------

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

}