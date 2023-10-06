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

    public function testToArray() {
        $user = $this->mockUser();

        $arr = [
                    'id' => $user->getId(),
                    'firstName' => $user->getFirstName(),
                    'lastName' => $user->getLastName(),
                    'email' => $user->getEmail(),
                    'password' => $user->getHashedPassword(),
                    'phoneNumber' => $user->getPhoneNumber(),
                    'address' => $user->getAddress(),
                    'birthDate' => $user->getBirthDate(),
                    'role' => $user->getRole()
                ];

        $this->assertEquals($arr, $user->toArray());

    }

    public function testToMarkdown() {
        $user = $this->mockUser();

        $userMarkdown =  "## User: {$user->getFirstName()} {$user->getLastName()}
                - Email: {$user->getEmail()}
                - Phone Number: {$user->getPhoneNumber()}
                - Address: {$user->getAddress()}
                - Birth Date: {$user->getBirthDate()->format('Y-m-d')}
                - Role: {$user->getRole()}";
        
        $this->assertEquals($userMarkdown, $user->toMarkdown());
    }

    public function testToHTML() {
        $user = $this->mockUser();
        
        $userString = sprintf(
            "<div class='user-card'>
                    <div class='avatar'>SAMPLE</div>
                    <h2>%s %s</h2>
                    <p>%s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>Birth Date: %s</p>
                    <p>Membership Expiration Date: %s</p>
                    <p>Role: %s</p>
                </div>",
                $user->getFirstName(),
                $user->getLastName(),
                $user->getEmail(),
                $user->getPhoneNumber(),
                $user->getAddress(),
                $user->getBirthDate()->format('Y-m-d'),
                $user->getMembershipExpirationDate()->format('Y-m-d'),
                $user->getRole()
            );

        $this->assertEquals($userString, $user->toHTML());
    }

    public function testToString() {
        $user = $this->mockUser();

        $userString = sprintf(
            "User ID: %d\nName: %s %s\nEmail: %s\nPhone Number: %s\nAddress: %s\nBirth Date: %s\nMembership Expiration Date: %s\nRole: %s\n",
            $user->getId(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getEmail(),
            $user->getPhoneNumber(),
            $user->getAddress(),
            $user->getBirthDate()->format('Y-m-d'),
            $user->getMembershipExpirationDate()->format('Y-m-d'),
            $user->getRole()
        );

        $this->assertEquals($userString, $user->toString());
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