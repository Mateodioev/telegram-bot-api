<?php

namespace Tests\Types;

use Mateodioev\Bots\Telegram\Types\User;
use PHPUnit\Framework\TestCase;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use TypeError;

class ObjectsTest extends TestCase
{
    use dataSet;
    /**
     * @dataProvider userDataSet
     */
    public function testCreateSingleTypes(int $id, bool $is_bot, string $first_name) 
    {
        $user = User::createFromArray(compact('id', 'is_bot', 'first_name'));

        $this->assertInstanceOf(User::class, $user);

        $this->assertSame($user->id(), $id);
        $this->assertSame($user->isBot(), $is_bot);
        $this->assertSame($user->firstName(), $first_name);
    }

    /**
     * @dataProvider userDataSet
     */
    public function testBulkCreateSingleTypes(int $id, bool $is_bot, string $first_name)
    {
        $data = [compact('id', 'is_bot', 'first_name')];
        $users = User::bulkCreate($data);

        $this->assertTrue(gettype($users) == 'array');

        $user1 = $users[0];
        $data1 = $data[0];

        $this->assertSame($user1->id(), $data1['id']);
        $this->assertSame($user1->isBot(), $data1['is_bot']);
        $this->assertSame($user1->firstName(), $data1['first_name']);
    }

    /**
     * @dataProvider userDataSet
     */
    public function testSetInvalidProperty(int $id, bool $is_bot, string $first_name)
    {
        $data = [...compact('id', 'is_bot', 'first_name'), 'invalid_property' => 'invalid value'];
        
        $this->expectException(TelegramParamException::class);
        User::createFromArray($data);
    }

    /**
     * @dataProvider userDataSet
     */
    public function testGetInvalidProperty(int $id, bool $is_bot, string $first_name)
    {
        $user = User::createFromArray(compact('id', 'is_bot', 'first_name'));

        $this->assertSame($user->invalidProperty(), null);
    }

    /**
     * @dataProvider userDataSet
     */
    public function testCreateTypeFromAnotherType(int $id, bool $is_bot, string $first_name)
    {
        $data = compact('id', 'is_bot', 'first_name');
        
        $user1 = User::createFromArray($data);
        $user2 = User::createFromType(User::createFromArray($data));

        $this->assertSame($user1::class, $user2::class);

        $this->assertInstanceOf(User::class, $user1);
        $this->assertSame($user1->id(), $id);
        $this->assertSame($user1->isBot(), $is_bot);
        $this->assertSame($user1->firstName(), $first_name);

        $this->assertInstanceOf(User::class, $user2);
        $this->assertSame($user2->id(), $id);
        $this->assertSame($user2->isBot(), $is_bot);
        $this->assertSame($user2->firstName(), $first_name);

        $this->assertSame($user1->id(), $user2->id());
        $this->assertSame($user1->isBot(), $user2->isBot());
        $this->assertSame($user1->firstName(), $user2->firstName());
    }
}
