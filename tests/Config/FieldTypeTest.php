<?php

namespace Tests\Config;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Types\User;
use PHPUnit\Framework\TestCase;

class FieldTypeTest extends TestCase
{
    public function testSingleScalarType()
    {
        $type = new FieldType('string');

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(null));
        $this->assertFalse($type->match(new \stdClass()));

        $this->assertTrue($type->match('1'));
    }

    public function testScalarArrayType()
    {
        $type = new FieldType('string', true);

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(null));
        $this->assertFalse($type->match(new \stdClass()));

        $this->assertFalse($type->match('1'));
        $this->assertFalse($type->match(['1', 1, 1.9]));

        $this->assertTrue($type->match(['1']));
    }

    public function testOptionalValues()
    {
        $type = new FieldType('string', false, true);

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(new \stdClass()));
        $this->assertFalse($type->match([]));
        $this->assertFalse($type->match(['1']));

        $this->assertTrue($type->match('1'));
        $this->assertTrue($type->match(null));


        $type = new FieldType('string', true, true);

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(new \stdClass()));

        $this->assertFalse($type->match('1'));
        $this->assertTrue($type->match(null));
        $this->assertTrue($type->match([]));
        $this->assertTrue($type->match(['1']));
    }

    public function testObjectsTypes()
    {
        $type = new FieldType(User::class);

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(null));
        $this->assertFalse($type->match('1'));

        $this->assertFalse($type->match(new \stdClass()));
        $this->assertFalse($type->match(User::class));

        $this->assertTrue($type->match(new User));
    }

    public function testArrayObjectsTypes()
    {
        $type = new FieldType(User::class, true);

        $this->assertFalse($type->match(1));
        $this->assertFalse($type->match(1.1));
        $this->assertFalse($type->match([1]));
        $this->assertFalse($type->match(true));
        $this->assertFalse($type->match(null));
        $this->assertFalse($type->match('1'));

        $this->assertFalse($type->match(new \stdClass()));
        $this->assertFalse($type->match(User::class));
        $this->assertFalse($type->match(new User));
        $this->assertFalse($type->match([new User, new \stdClass]));

        $this->assertTrue($type->match([new User]));
        $this->assertTrue($type->match([new User, new User]));
    }
}
