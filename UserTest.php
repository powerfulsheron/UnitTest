<?php

namespace swag;

use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{

    public $validAge = 15;
    public $notValidAge = 11;
    public $nullValue = null;
    public $emptyValue = "";
    public $validMail = "lorenzo.canavaggio@laposte.net";
    public $validSurname = "lorenzo";
    public $validName = "canavaggio";
    public $user;

    public function testIsValidUser(): void
    {
        $user = new User($this->validMail, $this->validName, $this->validSurname, $this->validAge);
        $this->assertTrue($user->isValid());
    }

    public function testIsNotValidUser(): void
    {
        $user = new User($this->nullValue, $this->emptyValue, $this->emptyValue, $this->notValidAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidEmptyUserName(): void
    {
        $user = new User($this->validMail, $this->validName, $this->emptyValue, $this->validAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidNumericUserName(): void
    {
        $user = new User($this->validMail, $this->validAge, $this->emptyValue, $this->validAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidNullUserName(): void
    {
        $user = new User($this->validMail, $this->validName, $this->nullValue, $this->validAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidEmptyUserSurname(): void
    {
        $user = new User($this->validMail, $this->validName, $this->emptyValue, $this->validAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidNullUserSurname(): void
    {
        $user = new User($this->validMail, $this->validName, $this->nullValue, $this->validAge);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidNullUserAge(): void
    {
        $user = new User($this->validMail, $this->validName, $this->validSurname, $this->nullValue);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidEmptyUserAge(): void
    {
        $user = new User($this->validMail, $this->validName, $this->validSurname, $this->emptyValue);
        $this->assertFalse($user->isValid());
    }

    public function testIsValidStringUserAge(): void
    {
        $user = new User($this->validMail, $this->validName, $this->validSurname, $this->validName);
        $this->assertFalse($user->isValid());

    }

    public function testIsNotValidUserAge(): void
    {
        $user = new User($this->validMail, $this->validName, $this->nullValue, $this->notValidAge);
        $this->assertFalse($user->isValid());
    }

    protected  function setUp(): void
    {
        parent::setUp();
    }

    //Tests paramétrés

    // faire le setup
}