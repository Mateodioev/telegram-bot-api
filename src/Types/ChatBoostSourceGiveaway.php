<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The boost was obtained by the creation of a Telegram Premium giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription.
 *
 * @property string $source Source of the boost, always "giveaway"
 * @property int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
 * @property User|null $user Optional. User that won the prize in the giveaway if any
 * @property bool|null $is_unclaimed Optional. True, if the giveaway was completed, but there was no user to win the prize
 *
 * @method string source()
 * @method int giveawayMessageId()
 * @method User|null user()
 * @method bool|null isUnclaimed()
 *
 * @method static setSource(string $source)
 * @method static setGiveawayMessageId(int $giveawayMessageId)
 * @method static setUser(User|null $user)
 * @method static setIsUnclaimed(bool|null $isUnclaimed)
 *
 * @see https://core.telegram.org/bots/api#chatboostsourcegiveaway
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    protected function boot(): void
    {
        $this->fields = [
            'source'              => FieldType::single('string'),
            'giveaway_message_id' => FieldType::single('integer'),
            'user'                => FieldType::optional(User::class),
            'is_unclaimed'        => FieldType::optional('boolean'),
        ];
    }
}
