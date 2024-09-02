<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the user has selected the bot's message and tapped 'Reply'). This can be extremely useful if you want to create user-friendly step-by-step interfaces without having to sacrifice privacy mode. Not supported in channels and for messages sent on behalf of a Telegram Business account.
 *
 * @property bool $force_reply Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
 * @property string|null $input_field_placeholder Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
 * @property bool|null $selective Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot's message is a reply to a message in the same chat and forum topic, sender of the original message.
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
    public function __construct(
        bool $force_reply,
        ?string $input_field_placeholder = null,
        ?bool $selective = null,
    ) {
        parent::__construct([
            'force_reply'             => $force_reply,
            'input_field_placeholder' => $input_field_placeholder,
            'selective'               => $selective,
        ]);
    }

    protected function boot(): void
    {
        $this->fields = [
            'force_reply'             => FieldType::single('boolean'),
            'input_field_placeholder' => FieldType::optional('string'),
            'selective'               => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
