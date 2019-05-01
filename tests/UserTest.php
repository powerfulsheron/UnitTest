<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/User.php";

final class UserTest extends TestCase
{

    public $floatValidValue = 15.5;
    public $floatInvalidValue = 8.5;
    public $boolValue = true;
    public $arrayValue = ["lorenzo"];
    public $validAge = 15;
    public $notValidAge = 11;
    public $nullValue = null;
    public $emptyValue = "";
    public $validMail = "lorenzo.canavaggio@laposte.net";
    public $validSurname = "lorenzo";
    public $validName = "canavaggio";
    public $user;

    // USER

    public function testIsValidUser(): void
    {
        $this->assertTrue($this->user->isValid());
    }

    public function testIsNotValidUser(): void
    {
        $this->user = new User($this->nullValue, $this->emptyValue, $this->emptyValue, $this->notValidAge);
        $this->assertFalse($this->user->isValid());
    }

    // MAIL

    public function testIsValidEmptyUserEmail(): void
    {
        $this->user->setEmail($this->emptyValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidNullUserEmail(): void
    {
        $this->user->setEmail($this->nullValue);
        $this->assertFalse( $this->user->isValid());
    }

    public function testIsValidIntegerEmail(): void
    {
        $this->user->setEmail($this->validAge);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidFloatUserEmail(): void
    {
        $this->user->setEmail($this->floatValidValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidArrayUserEmail(): void
    {
        $this->user->setEmail($this->arrayValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidBoolUserEmail(): void
    {
        $this->user->setEmail($this->boolValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidWrongStringUserEmail(): void
    {
        $this->user->setEmail($this->validName);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidObjectUserEmail(): void
    {
        $this->user->setEmail($this->user);
        $this->assertFalse($this->user->isValid());
    }

    // USERNAME

    public function testIsValidEmptyUserName(): void
    {
        $this->user->setNom($this->emptyValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidNullUserName(): void
    {
        $this->user->setNom($this->nullValue);
        $this->assertFalse( $this->user->isValid());
    }

    public function testIsValidIntegerUserName(): void
    {
        $this->user->setNom($this->validAge);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidFloatUserName(): void
    {
        $this->user->setNom($this->floatValidValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidArrayUserName(): void
    {
        $this->user->setNom($this->arrayValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidBoolUserName(): void
    {
        $this->user->setNom($this->boolValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidObjectUserName(): void
    {
        $this->user->setNom($this->user);
        $this->assertFalse($this->user->isValid());
    }

    // SURNAME

    public function testIsValidEmptyUserSurname(): void
    {
        $this->user->setPrenom($this->emptyValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidNullUserSurname(): void
    {
        $this->user->setPrenom($this->nullValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidIntegerUserSurname(): void
    {
        $this->user->setPrenom($this->validAge);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidFloatUserSurname(): void
    {
        $this->user->setPrenom($this->floatValidValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidArrayUserSurname(): void
    {
        $this->user->setPrenom($this->arrayValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidBoolUserSurname(): void
    {
        $this->user->setPrenom($this->boolValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidObjectUserSurname(): void
    {
        $this->user->setPrenom($this->user);
        $this->assertFalse($this->user->isValid());
    }

    // AGE

    public function testIsValidNullUserAge(): void
    {
        $this->user->setAge($this->nullValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidEmptyUserAge(): void
    {
        $this->user->setAge($this->emptyValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidStringUserAge(): void
    {
        $this->user->setAge($this->validName);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsNotValidUserAge(): void
    {
        $this->user->setAge($this->notValidAge);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidGoodFloatUserAge(): void
    {
        $this->user->setAge($this->floatValidValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidWrongFloatUserAge(): void
    {
        $this->user->setAge($this->floatInvalidValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidArrayUserAge(): void
    {
        $this->user->setAge($this->arrayValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidBoolUserAge(): void
    {
        $this->user->setAge($this->boolValue);
        $this->assertFalse($this->user->isValid());
    }

    public function testIsValidObjectUserAge(): void
    {
        $this->user->setAge($this->user);
        $this->assertFalse($this->user->isValid());
    }

    // SET UP

    protected  function setUp(): void
    {
        $this->user = new User($this->validMail, $this->validName, $this->validSurname,$this->validAge);
    }

}