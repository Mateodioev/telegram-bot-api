<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 *
 * @property string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
 * @property string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
 * @property int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
 * @property UniqueGiftModel $model Model of the gift
 * @property UniqueGiftSymbol $symbol Symbol of the gift
 * @property UniqueGiftBackdrop $backdrop Backdrop of the gift
 *
 * @method string baseName()
 * @method string name()
 * @method int number()
 * @method UniqueGiftModel model()
 * @method UniqueGiftSymbol symbol()
 * @method UniqueGiftBackdrop backdrop()
 *
 * @method static setBaseName(string $baseName)
 * @method static setName(string $name)
 * @method static setNumber(int $number)
 * @method static setModel(UniqueGiftModel $model)
 * @method static setSymbol(UniqueGiftSymbol $symbol)
 * @method static setBackdrop(UniqueGiftBackdrop $backdrop)
 *
 * @see https://core.telegram.org/bots/api#uniquegift
 */
class UniqueGift extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'base_name' => FieldType::single('string'),
            'name'      => FieldType::single('string'),
            'number'    => FieldType::single('integer'),
            'model'     => FieldType::single(UniqueGiftModel::class),
            'symbol'    => FieldType::single(UniqueGiftSymbol::class),
            'backdrop'  => FieldType::single(UniqueGiftBackdrop::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
