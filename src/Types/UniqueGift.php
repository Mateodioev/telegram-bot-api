<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object describes a unique gift that was upgraded from a regular gift.
 *
 * @property string $gift_id Identifier of the regular gift from which the gift was upgraded
 * @property string $base_name Human-readable name of the regular gift from which this unique gift was upgraded
 * @property string $name Unique name of the gift. This name can be used in https://t.me/nft/... links and story areas
 * @property int $number Unique number of the upgraded gift among gifts upgraded from the same regular gift
 * @property UniqueGiftModel $model Model of the gift
 * @property UniqueGiftSymbol $symbol Symbol of the gift
 * @property UniqueGiftBackdrop $backdrop Backdrop of the gift
 * @property bool|null $is_premium Optional. True, if the original regular gift was exclusively purchaseable by Telegram Premium subscribers
 * @property bool|null $is_burned Optional. True, if the gift was used to craft another gift and isn't available anymore
 * @property bool|null $is_from_blockchain Optional. True, if the gift is assigned from the TON blockchain and can't be resold or transferred in Telegram
 * @property UniqueGiftColors|null $colors Optional. The color scheme that can be used by the gift's owner for the chat's name, replies to messages and link previews; for business account gifts and gifts that are currently on sale only
 * @property Chat|null $publisher_chat Optional. Information about the chat that published the gift
 *
 * @method string giftId()
 * @method string baseName()
 * @method string name()
 * @method int number()
 * @method UniqueGiftModel model()
 * @method UniqueGiftSymbol symbol()
 * @method UniqueGiftBackdrop backdrop()
 * @method bool|null isPremium()
 * @method bool|null isBurned()
 * @method bool|null isFromBlockchain()
 * @method UniqueGiftColors|null colors()
 * @method Chat|null publisherChat()
 *
 * @method static setGiftId(string $giftId)
 * @method static setBaseName(string $baseName)
 * @method static setName(string $name)
 * @method static setNumber(int $number)
 * @method static setModel(UniqueGiftModel $model)
 * @method static setSymbol(UniqueGiftSymbol $symbol)
 * @method static setBackdrop(UniqueGiftBackdrop $backdrop)
 * @method static setIsPremium(bool|null $isPremium)
 * @method static setIsBurned(bool|null $isBurned)
 * @method static setIsFromBlockchain(bool|null $isFromBlockchain)
 * @method static setColors(UniqueGiftColors|null $colors)
 * @method static setPublisherChat(Chat|null $publisherChat)
 *
 * @see https://core.telegram.org/bots/api#uniquegift
 */
class UniqueGift extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'gift_id'            => FieldType::single('string'),
            'base_name'          => FieldType::single('string'),
            'name'               => FieldType::single('string'),
            'number'             => FieldType::single('integer'),
            'model'              => FieldType::single(UniqueGiftModel::class),
            'symbol'             => FieldType::single(UniqueGiftSymbol::class),
            'backdrop'           => FieldType::single(UniqueGiftBackdrop::class),
            'is_premium'         => FieldType::optional('boolean'),
            'is_burned'          => FieldType::optional('boolean'),
            'is_from_blockchain' => FieldType::optional('boolean'),
            'colors'             => FieldType::optional(UniqueGiftColors::class),
            'publisher_chat'     => FieldType::optional(Chat::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
