<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/User.php";
require __DIR__ . "/../src/Product.php";

final class ProductTest extends TestCase
{
    public $product;
    public $user;

    public $floatValidValue = 15.5;
    public $boolValue = true;
    public $arrayValue = ["lorenzo"];
    public $validAge = 15;
    public $nullValue = null;
    public $emptyValue = "";
    public $validName = "canavaggio";
    public $validSurame = "lorenzo";

    // PRODUCT

    public function testIsValidProduct(): void
    {
        $this->assertTrue($this->product->isValid());
    }

    public function testIsNotValidProduct(): void
    {
        $this->user = new User($this->validSurname,$this->emptyValue,$this->nullValue,$this->notValidAge);
        $this->product = new Product($this->emptyValue,$this->user);
        $this->assertFalse($this->product->isValid());
    }

    // PRODUCT NAME

    public function testIsValidEmptyProductName(): void
    {
        $this->product->setNom($this->emptyValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidNullProductName(): void
    {
        $this->product->setNom($this->nullValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidIntegerProductName(): void
    {
        $this->product->setNom($this->validAge);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidFloatProductName(): void
    {
        $this->product->setNom($this->floatValidValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidArrayProductName(): void
    {
        $this->product->setNom($this->arrayValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidBoolProductName(): void
    {
        $this->product->setNom($this->boolValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidObjectProductName(): void
    {
        $this->product->setNom($this->product);
        $this->assertFalse($this->product->isValid());
    }

    // USER

    public function testOwnerIsUserInstance()
    {
        $this->assertInstanceOf(User::class, $this->getProduct()->getOwner());
    }

    public function testOwnerIsValid()
    {
        $this->assertTrue($this->product->getOwner()->isValid());
    }

    public function testIsValidUserProductName(): void
    {
        $this->product->setOwner(new User($this->validSurname,$this->emptyValue,$this->nullValue,$this->notValidAge));
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidEmptyUserProductName(): void
    {
        $this->product->setOwner($this->emptyValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidNullUserProductName(): void
    {
        $this->product->setOwner($this->nullValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidStringUserProductName(): void
    {
        $this->product->setOwner($this->validName);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidIntegerUserProductName(): void
    {
        $this->product->setOwner($this->validAge);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidFloatUserProductName(): void
    {
        $this->product->setOwner($this->floatValidValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidArrayUserProductName(): void
    {
        $this->product->setOwner($this->arrayValue);
        $this->assertFalse($this->product->isValid());
    }

    public function testIsValidBoolUserProductName(): void
    {
        $this->product->setOwner($this->boolValue);
        $this->assertFalse($this->product->isValid());
    }

    // SET UP

    protected  function setUp(): void
    {
        $this->user = $this->createMock(User::class);
        $this->user->method('isValid')->willReturn(true);
        $this->product = new Product("produit le sang",$this->user);
    }
}