<?php 

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Types\{MaskPosition, sendInputFile};
use stdClass;

/**
 * Stickers
 */
trait Stickers
{
  public function sendSticker(string|int $chatId, sendInputFile $sticker, array $params = []): stdClass
  {
    $payload = ['chat_id' => $chatId, 'sticker' => $sticker, ...$params];

    return $this->request('sendSticker', $payload);
  }

  public function getStickerSet(string $name): stdClass
  {
    return $this->request('getStickerSet', ['name' => $name]);
  }

  public function getCustomEmojiStickers(array $customIds): stdClass
  {
    return $this->request('getCustomEmojiStickers', ['custom_emoji_ids' => $customIds]);
  }

  /**
   * Use this method to upload a .PNG file with a sticker for later use in createNewStickerSet and addStickerToSet methods (can be used multiple times).
   */
  public function uploadStickerFile(int $userId, sendInputFile $pngSticker): stdClass
  {
    $payload = ['user_id' => $userId, 'png_sticker' => $pngSticker->get()];

    return $this->request('uploadStickerFile', $payload);
  }

  public function createNewStickerSet(int $userId, string $name, string $title, array $params = []): stdClass
  {
    $payload = ['user_id' => $userId, 'name' => $name, 'title' => $title, ...$params];

    return $this->request('createNewStickerSet', $payload);
  }

  public function addStickerToSet(int $userId, string $name, string $emojis, ?sendInputFile $pngSticker = null, ?sendInputFile $tgSticker=null, ?sendInputFile $webmSticker=null, ?MaskPosition $maskPosition=null): stdClass
  {
    $payload = ['user_id' => $userId, 'name' => $name, 'emojis' => $emojis];

    if ($pngSticker) $payload['pngSticker']     = $pngSticker->get();
    if ($tgSticker) $payload['tgs_sticker']     = $tgSticker->get();
    if ($webmSticker) $payload['webm_sticker']  = $webmSticker->get();
    if ($maskPosition) $payload['maskPosition'] = $maskPosition->get();

    return $this->request('addStickerToSet', $payload);
  }

  public function deleteStickerFromSet(string $sticker): stdClass
  {
    return $this->request('deleteStickerFromSet', ['sticker' => $sticker]);
  }

  public function setStickerSetThumb(string $name, int $userId, sendInputFile $thumb): stdClass
  {
    $payload = ['name' => $name, 'user_Id' => $userId, 'thumb' => $thumb]; 
    
    return $this->request('setStickerSetThumb', $payload);
  }
}

