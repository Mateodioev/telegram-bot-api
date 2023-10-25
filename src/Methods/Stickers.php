<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{File, InputFile, InputSticker, MaskPosition, Message, Sticker, StickerSet};

/**
 * Stickers methods
 * @see https://core.telegram.org/bots/api#stickers
 */
trait Stickers
{
    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     *
     * @see https://core.telegram.org/bots/api#sendsticker
     * @return Message
     */
    public function sendSticker(string|int $chatId, InputFile $sticker, array $params = []): TypesInterface
    {
        return $this->request(Method::create(['chat_id' => $chatId, 'sticker' => $sticker->get(), ...$params], 'sendSticker')
            ->setReturnType(Message::class));
    }

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     *
     * @see https://core.telegram.org/bots/api#getstickerset
     * @return StickerSet
     */
    public function getStickerSet(string $name): TypesInterface
    {
        return $this->request(Method::create(['name' => $name], 'getStickerSet')
            ->setReturnType(StickerSet::class));
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     *
     * @see https://core.telegram.org/bots/api#getcustomemojistickers
     * @throws TelegramParamException If the total of customIds is greater than 200
     * @return TypesInterface|Sticker[]
     */
    public function getCustomEmojiStickers(array $customIds): TypesInterface|array
    {
        if (count($customIds) > 200) {
            throw new TelegramParamException('The maximum number of custom emoji stickers is 200');
        }
        return $this->request(Method::create(['custom_emoji_ids' => $customIds], 'getCustomEmojiStickers')
            ->setReturnType(Sticker::class, true));
    }

    /**
     * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times)
     *
     * @see https://core.telegram.org/bots/api#uploadstickerfile
     * @return File
     */
    public function uploadStickerFile(int $userId, InputFile $pngSticker, string $stickerFormat = 'static'): TypesInterface
    {
        return $this->request(Method::create(['user_id' => $userId, 'png_sticker' => $pngSticker->get(), 'sticker_format' => $stickerFormat])
            ->setMethod('uploadStickerFile')
            ->setReturnType(File::class));
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker.
     *
     * @param InputSticker[] $stickers
     * @see https://core.telegram.org/bots/api#createnewstickerset
     */
    public function createNewStickerSet(int $userID, string $name, string $title, array $stickers, string $stickerFormat, array $params = []): TypesInterface
    {
        $stickers = \array_map(fn (InputSticker $sticker) => $sticker->getReduced(), $stickers);
        $stickers = \json_encode($stickers);

        return $this->request(
            Method::create(['user_id' => $userID, 'name' => $name, 'title' => $title, 'stickers' => $stickers, 'sticker_format' => $stickerFormat, ...$params])
                ->setMethod('createNewStickerSet')
        );
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. The format of the added sticker must match the format of the other stickers in the set.
     *
     * @see https://core.telegram.org/bots/api#addstickertoset
     */
    public function addStickerToSet(int $userID, string $name, InputSticker $sticker): TypesInterface
    {
        $sticker = json_encode($sticker->getReduced());

        return $this->request(
            Method::create(['user_id' => $userID, 'name' => $name, 'sticker' => $sticker])
                ->setMethod('addStickerToSet')
        );
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position.
     * @see https://core.telegram.org/bots/api#setstickerpositioninset
     */
    public function setStickerPositionInSet(string $sticker, int $position): TypesInterface
    {
        return $this->request(Method::create(['sticker' => $sticker, 'position' => $position], 'setStickerPositionInSet'));
    }

    /**
     * Use this method to delete a sticker from a set created by the bot.
     * @see https://core.telegram.org/bots/api#deletestickerfromset
     */
    public function deleteStickerFromSet(string $sticker): TypesInterface
    {
        return $this->request(Method::create(['sticker' => $sticker])
            ->setMethod('deleteStickerFromSet'));
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker.
     * The sticker must belong to a sticker set created by the bot.
     *
     * @param string[] $emojiList
     * @see https://core.telegram.org/bots/api#setstickeremojilist
     */
    public function setStickerEmojiList(string $sticker, array $emojiList): TypesInterface
    {
        if (count($emojiList) > 20) {
            throw new TelegramParamException('The maximum number of emoji in the input field is 20');
        }

        return $this->request(Method::create(['sticker' => $sticker, 'emoji_list' => json_encode($emojiList)])
            ->setMethod('setStickerEmojiList'));
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker.
     * The sticker must belong to a sticker set created by the bot.
     *
     * @param string[] $keywords
     * @see https://core.telegram.org/bots/api#setstickerthumb
     */
    public function setStickerKeywords(string $sticker, array $keywords): TypesInterface
    {
        if (count($keywords) > 20) {
            throw new TelegramParamException('The maximum number of keywords in the input field is 20');
        }

        return $this->request(Method::create(['sticker' => $sticker, 'keywords' => json_encode($keywords)])
            ->setMethod('setStickerKeywords'));
    }

    /**
     * Use this method to change the mask position of a mask sticker.
     * The sticker must belong to a sticker set that was created by the bot.
     *
     * @see https://core.telegram.org/bots/api#setstickermaskposition
     */
    public function setStickerMaskPosition(string $sticker, ?MaskPosition $maskPosition = null): TypesInterface
    {
        return $this->request(
            Method::create(['sticker' => $sticker, 'mask_position' => $maskPosition?->get()])
                ->setMethod('setStickerMaskPosition')
        );
    }

    /**
     * Use this method to set the title of a created sticker set.
     *
     * @see https://core.telegram.org/bots/api#setstickersettitle
     */
    public function setStickerSetTitle(string $name, string $title): TypesInterface
    {
        return $this->request(
            Method::create(['name' => $name, 'title' => $title], 'setStickerSetTitle')
        );
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set.
     * The format of the thumbnail file must match the format of the stickers in the set.
     *
     * @see https://core.telegram.org/bots/api#setstickersetthumbnail
     */
    public function setStickerSetThumbnail(string $name, int $userId, ?InputFile $thumbnail = null): TypesInterface
    {
        return $this->request(Method::create(['name' => $name, 'user_Id' => $userId, 'thumb' => $thumbnail->get()])
            ->setMethod('setStickerSetThumbnail'));
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set.
     *
     * @see https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     */
    public function setCustomEmojiStickerSetThumbnail(string $name, ?string $customEmojiID = null): TypesInterface
    {
        return $this->request(
            Method::create(['name' => $name, 'custom_emoji_id' => $customEmojiID])
                ->setMethod('setCustomEmojiStickerSetThumbnail')
        );
    }

    /**
     * Use this method to delete a sticker set that was created by the bot.
     *
     * @see https://core.telegram.org/bots/api#deletestickerset
     */
    public function deleteStickerSet(string $name): TypesInterface
    {
        return $this->request(
            Method::create(['name' => $name], 'deleteStickerSet')
        );
    }
}
