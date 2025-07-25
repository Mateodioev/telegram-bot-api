<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Contains the list of gifts received and owned by a user or a chat.
 *
 * @property int $total_count The total number of gifts owned by the user or the chat
 * @property OwnedGift[] $gifts The list of gifts
 * @property string|null $next_offset Optional. Offset for the next request. If empty, then there are no more results
 *
 * @method int totalCount()
 * @method OwnedGift[] gifts()
 * @method string|null nextOffset()
 *
 * @method static setTotalCount(int $totalCount)
 * @method static setGifts(OwnedGift[] $gifts)
 * @method static setNextOffset(string|null $nextOffset)
 *
 * @see https://core.telegram.org/bots/api#ownedgifts
 */
class OwnedGifts extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'total_count' => FieldType::single('integer'),
            'gifts'       => FieldType::array(OwnedGift::class),
            'next_offset' => FieldType::optional('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
