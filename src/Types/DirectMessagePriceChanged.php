<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a change in the price of direct messages sent to a channel chat.
 *
 * @property bool $are_direct_messages_enabled True, if direct messages are enabled for the channel chat; false otherwise
 * @property int|null $direct_message_star_count Optional. The new number of Telegram Stars that must be paid by users for each direct message sent to the channel. Does not apply to users who have been exempted by administrators. Defaults to 0.
 *
 * @method bool areDirectMessagesEnabled()
 * @method int|null directMessageStarCount()
 *
 * @method static setAreDirectMessagesEnabled(bool $areDirectMessagesEnabled)
 * @method static setDirectMessageStarCount(int|null $directMessageStarCount)
 *
 * @see https://core.telegram.org/bots/api#directmessagepricechanged
 */
class DirectMessagePriceChanged extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'are_direct_messages_enabled' => FieldType::single('boolean'),
            'direct_message_star_count'   => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
