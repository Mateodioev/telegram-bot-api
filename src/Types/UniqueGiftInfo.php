<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a unique gift that was sent or received.
 *
 * @property UniqueGift $gift Information about the gift
 * @property string $origin Origin of the gift. Currently, either "upgrade" for gifts upgraded from regular gifts, "transfer" for gifts transferred from other users or channels, "resale" for gifts bought from other users, "gifted_upgrade" for upgrades purchased after the gift was sent, or "offer" for gifts bought or sold through gift purchase offers
 * @property string|null $last_resale_currency Optional. For gifts bought from other users, the currency in which the payment for the gift was done. Currently, one of "XTR" for Telegram Stars or "TON" for toncoins.
 * @property int|null $last_resale_amount Optional. For gifts bought from other users, the price paid for the gift in either Telegram Stars or nanotoncoins
 * @property string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on behalf of business accounts
 * @property int|null $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer the gift
 * @property int|null $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in the past, then the gift can be transferred now
 *
 * @method UniqueGift gift()
 * @method string origin()
 * @method string|null lastResaleCurrency()
 * @method int|null lastResaleAmount()
 * @method string|null ownedGiftId()
 * @method int|null transferStarCount()
 * @method int|null nextTransferDate()
 *
 * @method static setGift(UniqueGift $gift)
 * @method static setOrigin(string $origin)
 * @method static setLastResaleCurrency(string|null $lastResaleCurrency)
 * @method static setLastResaleAmount(int|null $lastResaleAmount)
 * @method static setOwnedGiftId(string|null $ownedGiftId)
 * @method static setTransferStarCount(int|null $transferStarCount)
 * @method static setNextTransferDate(int|null $nextTransferDate)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftinfo
 */
class UniqueGiftInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'gift'                 => FieldType::single(UniqueGift::class),
            'origin'               => FieldType::single('string'),
            'last_resale_currency' => FieldType::optional('string'),
            'last_resale_amount'   => FieldType::optional('integer'),
            'owned_gift_id'        => FieldType::optional('string'),
            'transfer_star_count'  => FieldType::optional('integer'),
            'next_transfer_date'   => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
