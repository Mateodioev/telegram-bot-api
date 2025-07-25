<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the backdrop of a unique gift.
 *
 * @property string $name Name of the backdrop
 * @property UniqueGiftBackdropColors $colors Colors of the backdrop
 * @property int $rarity_per_mille The number of unique gifts that receive this backdrop for every 1000 gifts upgraded
 *
 * @method string name()
 * @method UniqueGiftBackdropColors colors()
 * @method int rarityPerMille()
 *
 * @method static setName(string $name)
 * @method static setColors(UniqueGiftBackdropColors $colors)
 * @method static setRarityPerMille(int $rarityPerMille)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftbackdrop
 */
class UniqueGiftBackdrop extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'             => FieldType::single('string'),
            'colors'           => FieldType::single(UniqueGiftBackdropColors::class),
            'rarity_per_mille' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
