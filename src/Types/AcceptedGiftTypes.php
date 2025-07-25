<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes the types of gifts that can be gifted to a user or a chat.
 *
 * @property bool $unlimited_gifts True, if unlimited regular gifts are accepted
 * @property bool $limited_gifts True, if limited regular gifts are accepted
 * @property bool $unique_gifts True, if unique gifts or gifts that can be upgraded to unique for free are accepted
 * @property bool $premium_subscription True, if a Telegram Premium subscription is accepted
 *
 * @method bool unlimitedGifts()
 * @method bool limitedGifts()
 * @method bool uniqueGifts()
 * @method bool premiumSubscription()
 *
 * @method static setUnlimitedGifts(bool $unlimitedGifts)
 * @method static setLimitedGifts(bool $limitedGifts)
 * @method static setUniqueGifts(bool $uniqueGifts)
 * @method static setPremiumSubscription(bool $premiumSubscription)
 *
 * @see https://core.telegram.org/bots/api#acceptedgifttypes
 */
class AcceptedGiftTypes extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'unlimited_gifts'      => FieldType::single('boolean'),
            'limited_gifts'        => FieldType::single('boolean'),
            'unique_gifts'         => FieldType::single('boolean'),
            'premium_subscription' => FieldType::single('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
