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
    public function login(string $password) :bool{
        
        return password_verify($password, $this->hashedPassword);
    }

    public function updateProfile(string $address, string $phoneNumber) : void{
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }
    public function renewMembership(DateTime $expirationDate) : void{
        $this->membershipExpirationDate = $expirationDate;
    }
    public function changePassword(string $newPassword) : void{
        $this->hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    }
    public function hasMembershipExpired() :bool{
        $currendDate = new DateTime();
        return $currendDate > $this->membershipExpirationDate;
    }


    public function toString():string{
        return sprintf(
            "User ID: %d\nName: %s %s\nEmail: %s\nPhone Number: %s\nAddress: %s\nBirth Date: %s\nMembership Expiration Date: %s\nRole: %s\n",
            $this->id,
            $this->firstName,
            $this->lastName,
            $this->email,
            $this->phoneNumber,
            $this->address,
            $this->birthDate->format('Y-m-d'),
            $this->membershipExpirationDate->format('Y-m-d'),
            $this->role
        );
    }
    public function toHTML():string{
        return sprintf("<div class='user-card'>
                    <div class='avatar'>SAMPLE</div>
                    <h2>%s %s</h2>
                    <p>%s</p>
                    <p>%s</p>
                    <p>%s</p>
                    <p>Birth Date: %s</p>
                    <p>Membership Expiration Date: %s</p>
                    <p>Role: %s</p>
                </div>",
                $this->firstName,
                $this->lastName,
                $this->email,
                $this->phoneNumber,
                $this->address,
                $this->birthDate->format('Y-m-d'),
                $this->membershipExpirationDate->format('Y-m-d'),
                $this->role
            );
    }
    public function toMarkdown():string{
        return "";
    }
    public function toArray():array{
    return [
                'id' => $this->id,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'password' => $this->hashedPassword,
                'phoneNumber' => $this->phoneNumber,
                'address' => $this->address,
                'birthDate' => $this->birthDate,
                // 'isActive' => $this->isActive,
                'role' => $this->role
            ];
    }



    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstName
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of hashedPassword
     *
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * Set the value of hashedPassword
     *
     * @param string $hashedPassword
     *
     * @return self
     */
    public function setHashedPassword(string $hashedPassword): self
    {
        $this->hashedPassword = $hashedPassword;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return self
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

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
     * Get the value of birthDate
     *
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @param DateTime $birthDate
     *
     * @return self
     */
    public function setBirthDate(DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the value of membershipExpirationDate
     *
     * @return DateTIme
     */
    public function getMembershipExpirationDate(): DateTIme
    {
        return $this->membershipExpirationDate;
    }

    /**
     * Set the value of membershipExpirationDate
     *
     * @param DateTIme $membershipExpirationDate
     *
     * @return self
     */
    public function setMembershipExpirationDate(DateTIme $membershipExpirationDate): self
    {
        $this->membershipExpirationDate = $membershipExpirationDate;

        return $this;
    }

    /**
     * Get the value of role
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param string $role
     *
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}