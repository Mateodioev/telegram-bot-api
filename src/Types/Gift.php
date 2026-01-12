<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object represents a gift that can be sent by the bot.
 *
 * @property string $id Unique identifier of the gift
 * @property Sticker $sticker The sticker that represents the gift
 * @property int $star_count The number of Telegram Stars that must be paid to send the sticker
 * @property int|null $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one
 * @property bool|null $is_premium Optional. True, if the gift can only be purchased by Telegram Premium subscribers
 * @property bool|null $has_colors Optional. True, if the gift can be used (after being upgraded) to customize a user's appearance
 * @property int|null $total_count Optional. The total number of gifts of this type that can be sent by all users; for limited gifts only
 * @property int|null $remaining_count Optional. The number of remaining gifts of this type that can be sent by all users; for limited gifts only
 * @property int|null $personal_total_count Optional. The total number of gifts of this type that can be sent by the bot; for limited gifts only
 * @property int|null $personal_remaining_count Optional. The number of remaining gifts of this type that can be sent by the bot; for limited gifts only
 * @property GiftBackground|null $background Optional. Background of the gift
 * @property int|null $unique_gift_variant_count Optional. The total number of different unique gifts that can be obtained by upgrading the gift
 * @property Chat|null $publisher_chat Optional. Information about the chat that published the gift
 *
 * @method string id()
 * @method Sticker sticker()
 * @method int starCount()
 * @method int|null upgradeStarCount()
 * @method bool|null isPremium()
 * @method bool|null hasColors()
 * @method int|null totalCount()
 * @method int|null remainingCount()
 * @method int|null personalTotalCount()
 * @method int|null personalRemainingCount()
 * @method GiftBackground|null background()
 * @method int|null uniqueGiftVariantCount()
 * @method Chat|null publisherChat()
 *
 * @method static setId(string $id)
 * @method static setSticker(Sticker $sticker)
 * @method static setStarCount(int $starCount)
 * @method static setUpgradeStarCount(int|null $upgradeStarCount)
 * @method static setIsPremium(bool|null $isPremium)
 * @method static setHasColors(bool|null $hasColors)
 * @method static setTotalCount(int|null $totalCount)
 * @method static setRemainingCount(int|null $remainingCount)
 * @method static setPersonalTotalCount(int|null $personalTotalCount)
 * @method static setPersonalRemainingCount(int|null $personalRemainingCount)
 * @method static setBackground(GiftBackground|null $background)
 * @method static setUniqueGiftVariantCount(int|null $uniqueGiftVariantCount)
 * @method static setPublisherChat(Chat|null $publisherChat)
 *
 * @see https://core.telegram.org/bots/api#gift
 */
class Gift extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                        => FieldType::single('string'),
            'sticker'                   => FieldType::single(Sticker::class),
            'star_count'                => FieldType::single('integer'),
            'upgrade_star_count'        => FieldType::optional('integer'),
            'is_premium'                => FieldType::optional('boolean'),
            'has_colors'                => FieldType::optional('boolean'),
            'total_count'               => FieldType::optional('integer'),
            'remaining_count'           => FieldType::optional('integer'),
            'personal_total_count'      => FieldType::optional('integer'),
            'personal_remaining_count'  => FieldType::optional('integer'),
            'background'                => FieldType::optional(GiftBackground::class),
            'unique_gift_variant_count' => FieldType::optional('integer'),
            'publisher_chat'            => FieldType::optional(Chat::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
