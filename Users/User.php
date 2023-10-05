<?php

class User{
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

}