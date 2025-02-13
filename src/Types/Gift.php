<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a gift that can be sent by the bot.
 *
 * @property string $id Unique identifier of the gift
 * @property Sticker $sticker The sticker that represents the gift
 * @property int $star_count The number of Telegram Stars that must be paid to send the sticker
 * @property int|null $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one
 * @property int|null $total_count Optional. The total number of the gifts of this type that can be sent; for limited gifts only
 * @property int|null $remaining_count Optional. The number of remaining gifts of this type that can be sent; for limited gifts only
 *
 * @method string id()
 * @method Sticker sticker()
 * @method int starCount()
 * @method int|null upgradeStarCount()
 * @method int|null totalCount()
 * @method int|null remainingCount()
 *
 * @method static setId(string $id)
 * @method static setSticker(Sticker $sticker)
 * @method static setStarCount(int $starCount)
 * @method static setUpgradeStarCount(int|null $upgradeStarCount)
 * @method static setTotalCount(int|null $totalCount)
 * @method static setRemainingCount(int|null $remainingCount)
 *
 * @see https://core.telegram.org/bots/api#gift
 */
class Gift extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                 => FieldType::single('string'),
            'sticker'            => FieldType::single(Sticker::class),
            'star_count'         => FieldType::single('integer'),
            'upgrade_star_count' => FieldType::optional('integer'),
            'total_count'        => FieldType::optional('integer'),
            'remaining_count'    => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
