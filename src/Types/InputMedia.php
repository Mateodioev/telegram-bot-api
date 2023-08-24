<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents the content of a media message to be sent. It should be one of
 * - InputMediaAnimation
 * - InputMediaDocument
 * - InputMediaAudio
 * - InputMediaPhoto
 * - InputMediaVideo
 *
 * @see https://core.telegram.org/bots/api#inputmedia
 */
class InputMedia extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
    }
}
