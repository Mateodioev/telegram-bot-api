<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode.
 *
 * @property bool $force_reply Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
 * @property string|null $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
 * @property bool|null $selective Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the original message.
 *
 * @method bool forceReply()
 * @method string|null inputFieldPlaceholder()
 * @method bool|null selective()
 *
 * @method static setForceReply(bool $forceReply)
 * @method static setInputFieldPlaceholder(string|null $inputFieldPlaceholder)
 * @method static setSelective(bool|null $selective)
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
