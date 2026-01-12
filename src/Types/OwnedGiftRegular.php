<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a regular gift owned by a user or a chat.
 *
 * @property string $type Type of the gift, always "regular"
 * @property Gift $gift Information about the regular gift
 * @property string|null $owned_gift_id Optional. Unique identifier of the gift for the bot; for gifts received on behalf of business accounts only
 * @property User|null $sender_user Optional. Sender of the gift if it is a known user
 * @property int $send_date Date the gift was sent in Unix time
 * @property string|null $text Optional. Text of the message that was added to the gift
 * @property MessageEntity[]|null $entities Optional. Special entities that appear in the text
 * @property bool|null $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be able to see them
 * @property bool|null $is_saved Optional. True, if the gift is displayed on the account's profile page; for gifts received on behalf of business accounts only
 * @property bool|null $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift; for gifts received on behalf of business accounts only
 * @property bool|null $was_refunded Optional. True, if the gift was refunded and isn't available anymore
 * @property int|null $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver instead of the gift; omitted if the gift cannot be converted to Telegram Stars; for gifts received on behalf of business accounts only
 * @property int|null $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were paid for the ability to upgrade the gift
 * @property bool|null $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent; for gifts received on behalf of business accounts only
 * @property int|null $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in UniqueGift
 *
 * @method string type()
 * @method Gift gift()
 * @method string|null ownedGiftId()
 * @method User|null senderUser()
 * @method int sendDate()
 * @method string|null text()
 * @method MessageEntity[]|null entities()
 * @method bool|null isPrivate()
 * @method bool|null isSaved()
 * @method bool|null canBeUpgraded()
 * @method bool|null wasRefunded()
 * @method int|null convertStarCount()
 * @method int|null prepaidUpgradeStarCount()
 * @method bool|null isUpgradeSeparate()
 * @method int|null uniqueGiftNumber()
 *
 * @method static setType(string $type)
 * @method static setGift(Gift $gift)
 * @method static setOwnedGiftId(string|null $ownedGiftId)
 * @method static setSenderUser(User|null $senderUser)
 * @method static setSendDate(int $sendDate)
 * @method static setText(string|null $text)
 * @method static setEntities(MessageEntity[]|null $entities)
 * @method static setIsPrivate(bool|null $isPrivate)
 * @method static setIsSaved(bool|null $isSaved)
 * @method static setCanBeUpgraded(bool|null $canBeUpgraded)
 * @method static setWasRefunded(bool|null $wasRefunded)
 * @method static setConvertStarCount(int|null $convertStarCount)
 * @method static setPrepaidUpgradeStarCount(int|null $prepaidUpgradeStarCount)
 * @method static setIsUpgradeSeparate(bool|null $isUpgradeSeparate)
 * @method static setUniqueGiftNumber(int|null $uniqueGiftNumber)
 *
 * @see https://core.telegram.org/bots/api#ownedgiftregular
 */
class OwnedGiftRegular extends OwnedGift
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                       => FieldType::single('string'),
            'gift'                       => FieldType::single(Gift::class),
            'owned_gift_id'              => FieldType::optional('string'),
            'sender_user'                => FieldType::optional(User::class),
            'send_date'                  => FieldType::single('integer'),
            'text'                       => FieldType::optional('string'),
            'entities'                   => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'is_private'                 => FieldType::optional('boolean'),
            'is_saved'                   => FieldType::optional('boolean'),
            'can_be_upgraded'            => FieldType::optional('boolean'),
            'was_refunded'               => FieldType::optional('boolean'),
            'convert_star_count'         => FieldType::optional('integer'),
            'prepaid_upgrade_star_count' => FieldType::optional('integer'),
            'is_upgrade_separate'        => FieldType::optional('boolean'),
            'unique_gift_number'         => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('regular');
    }
}
