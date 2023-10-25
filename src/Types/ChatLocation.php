<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a location to which a chat is connected.
 *
 * @property Location $location The location to which the supergroup is connected. Can't be a live location.
 * @property string $address Location address; 1-64 characters, as defined by the chat owner
 *
 * @method Location location()
 * @method string address()
 *
 * @method static setLocation(Location $location)
 * @method static setAddress(string $address)
 *
 * @see https://core.telegram.org/bots/api#chatlocation
 */
class ChatLocation extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'location' => FieldType::single(Location::class),
            'address'  => FieldType::single('string'),
        ];
    }
}
