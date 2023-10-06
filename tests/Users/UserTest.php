<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Users/User.php';

class UserTest extends TestCase {

    private function mockUser() {
        $id = 1;
        $firstName = "test firstName";
        $lastName = "test lastName";
        $email = "test@example.com";
        $hashedPassword = "test password";
        $phoneNumber = "090-0000-9999";
        $address = "test address";
        $birthDate = new DateTime("2023-05-15 18:00:00");
        $membershipExpirationDate = new DateTime("2023-05-15 18:00:00");
        $role = "test role";

        $user = new User(
            $id, $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $address, $birthDate, $membershipExpirationDate, $role,
        );

        return $user;
    }

    public function testGetter() {
        $user = $this->mockUser();
        $this->assertEquals(1, $user->getId());
        $this->assertEquals("test firstName", $user->getFirstName());
        $this->assertEquals("test lastName", $user->getLastName());
        $this->assertEquals("test@example.com", $user->getEmail());
        $this->assertEquals("test password", $user->getHashedPassword());
        $this->assertEquals("090-0000-9999", $user->getPhoneNumber());
        $this->assertEquals("test address", $user->getAddress());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $user->getBirthDate());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $user->getMembershipExpirationDate());
        $this->assertEquals("test role", $user->getRole());

    }

}