<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 *
 * @see https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'force_reply'             => FieldType::single('boolean'),
            'input_field_placeholder' => FieldType::optional('string'),
            'selective'               => FieldType::optional('boolean'),
        ];
    }
}
