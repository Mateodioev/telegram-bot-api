<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a service message about the completion of a giveaway without public winners.
 *
 * @property int $winner_count Number of winners in the giveaway
 * @property int|null $unclaimed_prize_count Optional. Number of undistributed prizes
 * @property Message|null $giveaway_message Optional. Message with the giveaway that was completed, if it wasn't deleted
 *
 * @method int winnerCount()
 * @method int|null unclaimedPrizeCount()
 * @method Message|null giveawayMessage()
 *
 * @method static setWinnerCount(int $winnerCount)
 * @method static setUnclaimedPrizeCount(int|null $unclaimedPrizeCount)
 * @method static setGiveawayMessage(Message|null $giveawayMessage)
 *
 * @see https://core.telegram.org/bots/api#giveawaycompleted
 */
class GiveawayCompleted extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'winner_count'          => FieldType::single('integer'),
            'unclaimed_prize_count' => FieldType::optional('integer'),
            'giveaway_message'      => FieldType::optional(Message::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
