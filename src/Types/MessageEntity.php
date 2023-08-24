<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'            => FieldType::single('string'),
            'offset'          => FieldType::single('integer'),
            'length'          => FieldType::single('integer'),
            'url'             => FieldType::optional('string'),
            'user'            => FieldType::optional(User::class),
            'language'        => FieldType::optional('string'),
            'custom_emoji_id' => FieldType::optional('string'),
        ];
    }
}
