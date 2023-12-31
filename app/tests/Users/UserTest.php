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

    public function testChangePassword() {
        $user = $this->mockUser();

        $user->changePassword("change password");

        $this->assertTrue($user->login("change password"));
    }

    public function testUpdateProfile() {
        $user = $this->mockUser();

        $user->updateProfile("change address", "0120-000-000");
        $this->assertEquals("change address", $user->getAddress());
        $this->assertEquals("0120-000-000", $user->getPhoneNumber());
    }

    public function testRenewMembership() {
        $user = $this->mockUser();

        $user->renewMembership(new DateTime("2023-12-31 18:00:00"));
        $this->assertEquals(new DateTime("2023-12-31 18:00:00"), $user->getMembershipExpirationDate());
    }

    public function testHasMembershipExpired() {
        $user = $this->mockUser();

        // 期限切れ(現在、2023-10-08)
        $this->assertFalse($user->hasMembershipExpired());

        // 期限内
        $user->setMembershipExpirationDate(new DateTime("2023-12-31 18:00:00"));
        $this->assertTrue($user->hasMembershipExpired());
    }

    public function testLogin() {
        $user = $this->mockUser();
        $this->assertTrue($user->login("test password"));
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
        $this->assertTrue($user->login("test password"));
        $this->assertEquals("090-0000-9999", $user->getPhoneNumber());
        $this->assertEquals("test address", $user->getAddress());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $user->getBirthDate());
        $this->assertEquals(new DateTime("2023-05-15 18:00:00"), $user->getMembershipExpirationDate());

        $this->assertEquals("test role", $user->getRole());

    }

}