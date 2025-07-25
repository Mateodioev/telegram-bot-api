<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a unique gift received and owned by a user or a chat.
 *
 * @property string $type Type of the gift, always "unique"
 * @property UniqueGift $gift Information about the unique gift
 * @property string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; for gifts received on behalf of business accounts only
 * @property User|null $sender_user Optional. Sender of the gift if it is a known user
 * @property int $send_date Date the gift was sent in Unix time
 * @property bool|null $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf of business accounts only
 * @property bool|null $can_be_transferred Optional. True, if the gift can be transferred to another owner; for gifts received on behalf of business accounts only
 * @property int|null $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer the gift
 * @property int|null $next_transfer_date Optional. Point in time (Unix timestamp) when the gift can be transferred. If it is in the past, then the gift can be transferred now
 *
 * @method string type()
 * @method UniqueGift gift()
 * @method string|null ownedGiftId()
 * @method User|null senderUser()
 * @method int sendDate()
 * @method bool|null isSaved()
 * @method bool|null canBeTransferred()
 * @method int|null transferStarCount()
 * @method int|null nextTransferDate()
 *
 * @method static setType(string $type)
 * @method static setGift(UniqueGift $gift)
 * @method static setOwnedGiftId(string|null $ownedGiftId)
 * @method static setSenderUser(User|null $senderUser)
 * @method static setSendDate(int $sendDate)
 * @method static setIsSaved(bool|null $isSaved)
 * @method static setCanBeTransferred(bool|null $canBeTransferred)
 * @method static setTransferStarCount(int|null $transferStarCount)
 * @method static setNextTransferDate(int|null $nextTransferDate)
 *
 * @see https://core.telegram.org/bots/api#ownedgiftunique
 */
class OwnedGiftUnique extends OwnedGift
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                => FieldType::single('string'),
            'gift'                => FieldType::single(UniqueGift::class),
            'owned_gift_id'       => FieldType::optional('string'),
            'sender_user'         => FieldType::optional(User::class),
            'send_date'           => FieldType::single('integer'),
            'is_saved'            => FieldType::optional('boolean'),
            'can_be_transferred'  => FieldType::optional('boolean'),
            'transfer_star_count' => FieldType::optional('integer'),
            'next_transfer_date'  => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('unique');
    }
}
