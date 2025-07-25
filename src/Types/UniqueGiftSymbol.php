<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the symbol shown on the pattern of a unique gift.
 *
 * @property string $name Name of the symbol
 * @property Sticker $sticker The sticker that represents the unique gift
 * @property int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gifts upgraded
 *
 * @method string name()
 * @method Sticker sticker()
 * @method int rarityPerMille()
 *
 * @method static setName(string $name)
 * @method static setSticker(Sticker $sticker)
 * @method static setRarityPerMille(int $rarityPerMille)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftsymbol
 */
class UniqueGiftSymbol extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'             => FieldType::single('string'),
            'sticker'          => FieldType::single(Sticker::class),
            'rarity_per_mille' => FieldType::single('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
