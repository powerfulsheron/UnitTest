<?php

namespace swag;

use PHPUnit\Framework\TestCase;

final class ProductTest extends TestCase
{
    public $product;
    public $user;

    public function testIsValidProduct(): void
    {
        $this->assertTrue($this->product->isValid());
    }

    protected  function setUp(): void
    {
        $this->user = new User("lorenzo.canavaggio@laposte.net","canavaggio","lorenzo",15);
        $this->product = new Product("produit le sang",$this->user);
    }
}