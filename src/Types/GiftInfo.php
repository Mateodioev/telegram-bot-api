<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a service message about a regular gift that was sent or received.
 *
 * @property Gift $gift Information about the gift
 * @property string|null $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on behalf of business accounts
 * @property int|null $convert_star_count Optional. Number of Telegram Stars that can be claimed by the receiver by converting the gift; omitted if conversion to Telegram Stars is impossible
 * @property int|null $prepaid_upgrade_star_count Optional. Number of Telegram Stars that were prepaid for the ability to upgrade the gift
 * @property bool|null $is_upgrade_separate Optional. True, if the gift's upgrade was purchased after the gift was sent
 * @property bool|null $can_be_upgraded Optional. True, if the gift can be upgraded to a unique gift
 * @property string|null $text Optional. Text of the message that was added to the gift
 * @property MessageEntity[]|null $entities Optional. Special entities that appear in the text
 * @property bool|null $is_private Optional. True, if the sender and gift text are shown only to the gift receiver; otherwise, everyone will be able to see them
 * @property int|null $unique_gift_number Optional. Unique number reserved for this gift when upgraded. See the number field in UniqueGift
 *
 * @method Gift gift()
 * @method string|null ownedGiftId()
 * @method int|null convertStarCount()
 * @method int|null prepaidUpgradeStarCount()
 * @method bool|null isUpgradeSeparate()
 * @method bool|null canBeUpgraded()
 * @method string|null text()
 * @method MessageEntity[]|null entities()
 * @method bool|null isPrivate()
 * @method int|null uniqueGiftNumber()
 *
 * @method static setGift(Gift $gift)
 * @method static setOwnedGiftId(string|null $ownedGiftId)
 * @method static setConvertStarCount(int|null $convertStarCount)
 * @method static setPrepaidUpgradeStarCount(int|null $prepaidUpgradeStarCount)
 * @method static setIsUpgradeSeparate(bool|null $isUpgradeSeparate)
 * @method static setCanBeUpgraded(bool|null $canBeUpgraded)
 * @method static setText(string|null $text)
 * @method static setEntities(MessageEntity[]|null $entities)
 * @method static setIsPrivate(bool|null $isPrivate)
 * @method static setUniqueGiftNumber(int|null $uniqueGiftNumber)
 *
 * @see https://core.telegram.org/bots/api#giftinfo
 */
class GiftInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'gift'                       => FieldType::single(Gift::class),
            'owned_gift_id'              => FieldType::optional('string'),
            'convert_star_count'         => FieldType::optional('integer'),
            'prepaid_upgrade_star_count' => FieldType::optional('integer'),
            'is_upgrade_separate'        => FieldType::optional('boolean'),
            'can_be_upgraded'            => FieldType::optional('boolean'),
            'text'                       => FieldType::optional('string'),
            'entities'                   => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'is_private'                 => FieldType::optional('boolean'),
            'unique_gift_number'         => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
