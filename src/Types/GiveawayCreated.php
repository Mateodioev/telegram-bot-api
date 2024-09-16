<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a service message about the creation of a scheduled giveaway.
 *
 * @property int|null $prize_star_count Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
 *
 * @method int|null prizeStarCount()
 *
 * @method static setPrizeStarCount(int|null $prizeStarCount)
 *
 * @see https://core.telegram.org/bots/api#giveawaycreated
 */
class GiveawayCreated extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'prize_star_count' => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
