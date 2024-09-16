<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This boosts the chat 4 times for the duration of the corresponding Telegram Premium subscription for Telegram Premium giveaways and prize_star_count / 500 times for one year for Telegram Star giveaways.
 *
 * @property string $source Source of the boost, always "giveaway"
 * @property int $giveaway_message_id Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
 * @property User|null $user Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only
 * @property int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 * @property bool|null $is_unclaimed Optional. True, if the giveaway was completed, but there was no user to win the prize
 *
 * @method string source()
 * @method int giveawayMessageId()
 * @method User|null user()
 * @method int|null prizeStarCount()
 * @method bool|null isUnclaimed()
 *
 * @method static setSource(string $source)
 * @method static setGiveawayMessageId(int $giveawayMessageId)
 * @method static setUser(User|null $user)
 * @method static setPrizeStarCount(int|null $prizeStarCount)
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
            'prize_star_count'    => FieldType::optional('integer'),
            'is_unclaimed'        => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
