<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the model of a unique gift.
 *
 * @property string $name Name of the model
 * @property Sticker $sticker The sticker that represents the unique gift
 * @property int $rarity_per_mille The number of unique gifts that receive this model for every 1000 gift upgrades. Always 0 for crafted gifts.
 * @property string|null $rarity Optional. Rarity of the model if it is a crafted model. Currently, can be "uncommon", "rare", "epic", or "legendary".
 *
 * @method string name()
 * @method Sticker sticker()
 * @method int rarityPerMille()
 * @method string|null rarity()
 *
 * @method static setName(string $name)
 * @method static setSticker(Sticker $sticker)
 * @method static setRarityPerMille(int $rarityPerMille)
 * @method static setRarity(string|null $rarity)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftmodel
 */
class UniqueGiftModel extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'name'             => FieldType::single('string'),
            'sticker'          => FieldType::single(Sticker::class),
            'rarity_per_mille' => FieldType::single('integer'),
            'rarity'           => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
