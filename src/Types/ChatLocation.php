<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Represents a location to which a chat is connected.
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
