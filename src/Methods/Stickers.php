<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\sendInputFile;
use Mateodioev\Bots\Telegram\Types\{File, MaskPosition, Sticker, StickerSet};

/**
 * Stickers
 */
trait Stickers
{
  public function sendSticker(string|int $chatId, sendInputFile $sticker, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'sticker' => $sticker, ...$params])
      ->setMethod('sendSticker')
      ->setReturnType(Message::class));
  }

  public function getStickerSet(string $name): TypesInterface
  {
    return $this->request(Method::create(['name' => $name])
      ->setMethod('getStickerSet')
      ->setReturnType(StickerSet::class));
  }

  public function getCustomEmojiStickers(array $customIds): TypesInterface
  {
    return $this->request(Method::create(['custom_emoji_ids' => $customIds])
      ->setMethod('getCustomEmojiStickers')
      ->setReturnType(Sticker::class, true));
  }

  /**
   * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times).
   */
  public function uploadStickerFile(int $userId, sendInputFile $pngSticker): TypesInterface
  {
    $payload = ['user_id' => $userId, 'png_sticker' => $pngSticker->get()];

    return $this->request(Method::create()
      ->setMethod('uploadStickerFile')
      ->setReturnType(File::class));
  }

  public function createNewStickerSet(int $userId, string $name, string $title, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['user_id' => $userId, 'name' => $name, 'title' => $title, ...$params])
      ->setMethod('createNewStickerSet'));
  }

  public function addStickerToSet(int $userId, string $name, string $emojis, ?sendInputFile $pngSticker = null, ?sendInputFile $tgSticker=null, ?sendInputFile $webmSticker=null, ?MaskPosition $maskPosition=null): TypesInterface
  {
    $payload = ['user_id' => $userId, 'name' => $name, 'emojis' => $emojis];

    if ($pngSticker) $payload['pngSticker']     = $pngSticker->get();
    if ($tgSticker) $payload['tgs_sticker']     = $tgSticker->get();
    if ($webmSticker) $payload['webm_sticker']  = $webmSticker->get();
    if ($maskPosition) $payload['maskPosition'] = $maskPosition->get();

    return $this->request(Method::create($payload)
      ->setMethod('addStickerToSet'));
  }

  public function deleteStickerFromSet(string $sticker): TypesInterface
  {
    return $this->request(Method::create(['sticker' => $sticker])
      ->setMethod('deleteStickerFromSet'));
  }

  public function setStickerSetThumb(string $name, int $userId, sendInputFile $thumb): TypesInterface
  {
    return $this->request(Method::create(['name' => $name, 'user_Id' => $userId, 'thumb' => $thumb->get()])
      ->setMethod('setStickerSetThumb'));
  }
}
