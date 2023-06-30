<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\sendInputFile;
use Mateodioev\Bots\Telegram\Types\{File, MaskPosition, Message, Sticker, StickerSet};

/**
 * Stickers methods
 * @see https://core.telegram.org/bots/api#stickers
 */
trait Stickers
{
    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     * @see https://core.telegram.org/bots/api#sendsticker
     */
    public function sendSticker(string|int $chatId, sendInputFile $sticker, array $params = []): TypesInterface
    {
        return $this->request(Method::create(['chat_id' => $chatId, 'sticker' => $sticker->get(), ...$params], 'senSticker')
            ->setReturnType(Message::class));
    }

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     * @see https://core.telegram.org/bots/api#getstickerset
     */
    public function getStickerSet(string $name): TypesInterface
    {
        return $this->request(Method::create(['name' => $name], 'getStickerSet')
            ->setReturnType(StickerSet::class));
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     * @see https://core.telegram.org/bots/api#getcustomemojistickers
     * @throws TelegramParamException If the total of customIds is greater than 200
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
     * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times). Returns the uploaded File on success.
     * @see https://core.telegram.org/bots/api#uploadstickerfile
     */
    public function uploadStickerFile(int $userId, sendInputFile $pngSticker): TypesInterface
    {
        return $this->request(Method::create(['user_id' => $userId, 'png_sticker' => $pngSticker->get()], 'uploadStickerFile')
            ->setReturnType(File::class));
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker.
     * @return TypesInterface Return Response type
     * @see https://core.telegram.org/bots/api#createnewstickerset
     */
    public function createNewStickerSet(int $userId, string $name, string $title, array $params = []): TypesInterface
    {
        return $this->request(Method::create(['user_id' => $userId, 'name' => $name, 'title' => $title, ...$params], 'createNewStickerSet'));
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. You must use exactly one of the fields png_sticker, tgs_sticker, or webm_sticker. Animated stickers can be added to animated sticker sets and only to them. Animated sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers.
     * @see https://core.telegram.org/bots/api#addstickertoset
     */
    public function addStickerToSet(int $userId, string $name, string $emojis, ?sendInputFile $pngSticker = null, ?sendInputFile $tgSticker = null, ?sendInputFile $webmSticker = null, ?MaskPosition $maskPosition = null): TypesInterface
    {
        $payload = ['user_id' => $userId, 'name' => $name, 'emojis' => $emojis];

        if ($pngSticker)
            $payload['pngSticker'] = $pngSticker->get();
        if ($tgSticker)
            $payload['tgs_sticker'] = $tgSticker->get();
        if ($webmSticker)
            $payload['webm_sticker'] = $webmSticker->get();
        if ($maskPosition)
            $payload['maskPosition'] = $maskPosition->get();

        return $this->request(Method::create($payload, 'addStickerToSet'));
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
     * Use this method to set the thumbnail of a sticker set. Animated thumbnails can be set for animated sticker sets only. Video thumbnails can be set only for video sticker sets only.
     * @see https://core.telegram.org/bots/api#setstickersetthumb
     */
    public function setStickerSetThumb(string $name, int $userId, sendInputFile $thumb): TypesInterface
    {
        return $this->request(Method::create(['name' => $name, 'user_Id' => $userId, 'thumb' => $thumb->get()])
            ->setMethod('setStickerSetThumb'));
    }
}