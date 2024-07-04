<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object represents one result of an inline query. Telegram clients currently support results of the following 20 types:
 * - InlineQueryResultCachedAudio
 * - InlineQueryResultCachedDocument
 * - InlineQueryResultCachedGif
 * - InlineQueryResultCachedMpeg4Gif
 * - InlineQueryResultCachedPhoto
 * - InlineQueryResultCachedSticker
 * - InlineQueryResultCachedVideo
 * - InlineQueryResultCachedVoice
 * - InlineQueryResultArticle
 * - InlineQueryResultAudio
 * - InlineQueryResultContact
 * - InlineQueryResultGame
 * - InlineQueryResultDocument
 * - InlineQueryResultGif
 * - InlineQueryResultLocation
 * - InlineQueryResultMpeg4Gif
 * - InlineQueryResultPhoto
 * - InlineQueryResultVenue
 * - InlineQueryResultVideo
 * - InlineQueryResultVoice
 * Note: All URLs passed in inline query results will be available to end users and therefore must be assumed to be public.
 *
 * @see https://core.telegram.org/bots/api#inlinequeryresult
 */
class InlineQueryResult extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [

        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function childs(): array
    {
        return [
            InlineQueryResultCachedAudio::class,
            InlineQueryResultCachedDocument::class,
            InlineQueryResultCachedGif::class,
            InlineQueryResultCachedMpeg4Gif::class,
            InlineQueryResultCachedPhoto::class,
            InlineQueryResultCachedSticker::class,
            InlineQueryResultCachedVideo::class,
            InlineQueryResultCachedVoice::class,
            InlineQueryResultArticle::class,
            InlineQueryResultAudio::class,
            InlineQueryResultContact::class,
            InlineQueryResultGame::class,
            InlineQueryResultDocument::class,
            InlineQueryResultGif::class,
            InlineQueryResultLocation::class,
            InlineQueryResultMpeg4Gif::class,
            InlineQueryResultPhoto::class,
            InlineQueryResultVenue::class,
            InlineQueryResultVideo::class,
            InlineQueryResultVoice::class,
        ];
    }
}
