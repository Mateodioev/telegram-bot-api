<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
 *
 * @see https://core.telegram.org/bots/api#inlinequery
 */
class InlineQuery extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'        => FieldType::single('string'),
            'from'      => FieldType::single(User::class),
            'query'     => FieldType::single('string'),
            'offset'    => FieldType::single('string'),
            'chat_type' => FieldType::optional('string'),
            'location'  => FieldType::optional(Location::class),
        ];
    }
}
