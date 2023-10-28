<?php

namespace Mateodioev\Bots\Telegram\Inline;

use Mateodioev\Bots\Telegram\Buttons\InlineKeyboardMarkupFactory;
use Mateodioev\Bots\Telegram\Config\foreachable;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Types\{
    InlineQueryResult,
    InlineQueryResultArticle,
    InlineQueryResultAudio,
    InlineQueryResultCachedAudio,
    InlineQueryResultCachedDocument,
    InlineQueryResultCachedGif,
    InlineQueryResultCachedMpeg4Gif,
    InlineQueryResultCachedPhoto,
    InlineQueryResultCachedSticker,
    InlineQueryResultCachedVideo,
    InlineQueryResultCachedVoice,
    InlineQueryResultContact,
    InlineQueryResultDocument,
    InlineQueryResultGame,
    InlineQueryResultGif,
    InlineQueryResultLocation,
    InlineQueryResultMpeg4Gif,
    InlineQueryResultPhoto,
    InlineQueryResultVenue,
    InlineQueryResultVideo,
    InlineQueryResultVoice,
    InputMessageContent};
use Mateodioev\Utils\Network;

use function count;

/**
 * @api
 */
class InlineQueryResultsFactory extends foreachable
{
    public const MAX_RESULTS = 50;

    /** @var InlineQueryResult[] Results */
    public array $results = [];

    /**
     * Add new InlineQueryResult to results.
     */
    public function add(InlineQueryResult $result): static
    {
        if (count($this->results) > self::MAX_RESULTS) {
            throw new TelegramParamException('Exceeded maximum number of results');
        }
        if ($result::class === InlineQueryResult::class) {
            throw new TelegramParamException('Invalid inline query result type');
        }

        $this->results[] = $result;

        return $this;
    }

    public function total(): int
    {
        return count($this->results);
    }

    /**
     * Get all results
     *
     * @return InlineQueryResult[]
     */
    public function all(): array
    {
        return $this->results;
    }

    /**
     * Convert results to json-serialized object.
     */
    public function toJson(): string
    {
        return InlineQueryResult::bulkToJson($this->all());
    }

    /**
     * Represents a link to an MP3 audio file stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedaudio
     */
    public function cachedAudio(?string $id, string $audioFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedAudio::default()
                ->setId($id ?? InlineFactory::randId())
                ->setAudioFileId($audioFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a file stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
     */
    public function cachedDocument(?string $id, string $title, string $documentFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedDocument::default()
                ->setId($id ?? InlineFactory::randId())
                ->setTitle($title)
                ->setDocumentFileId($documentFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to an animated GIF file stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedgif
     */
    public function cachedGif(?string $id, string $gifFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedGif::default()
                ->setId($id ?? InlineFactory::randId())
                ->setGifFileId($gifFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
     */
    public function cachedMpeg4Gif(?string $id, string $mpeg4FileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedMpeg4Gif::default()
                ->setId($id ?? InlineFactory::randId())
                ->setMpeg4FileId($mpeg4FileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a photo stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedphoto
     */
    public function cachedPhoto(?string $id, string $photoFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedPhoto::default()
                ->setId($id ?? InlineFactory::randId())
                ->setPhotoFileId($photoFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a sticker stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedsticker
     */
    public function cachedSticker(?string $id, string $stickerFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedSticker::default()
                ->setId($id ?? InlineFactory::randId())
                ->setStickerFileId($stickerFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a video file stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvideo
     */
    public function cachedVideo(?string $id, string $videoFileID, string $title, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedVideo::default()
                ->setId($id ?? InlineFactory::randId())
                ->setVideoFileId($videoFileID)
                ->setTitle($title)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a voice message stored on the Telegram servers.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
     */
    public function cachedVoice(?string $id, string $voiceFileID, array $params = []): static
    {
        return $this->add(
            InlineQueryResultCachedVoice::default()
                ->setId($id ?? InlineFactory::randId())
                ->setVoiceFileId($voiceFileID)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to an article or web page.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultarticle
     */
    public function article(?string $id, string $title, InputMessageContent $inputMessageContent, array $params = []): static
    {
        return $this->add(
            InlineQueryResultArticle::default()
                ->setId($id ?? InlineFactory::randId())
                ->setTitle($title)
                ->setInputMessageContent($inputMessageContent)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to an MP3 audio file
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultaudio
     */
    public function audio(?string $id, string $audioUrl, string $title, array $params = []): static
    {
        if (Network::IsValidUrl($audioUrl) === false) {
            throw new TelegramParamException('Invalid audio url');
        }

        return $this->add(
            InlineQueryResultAudio::default()
                ->setId($id ?? InlineFactory::randId())
                ->setAudioUrl($audioUrl)
                ->setTitle($title)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a contact with a phone number
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultcontact
     */
    public function contact(?string $id, string $phoneNumber, string $firstName, array $params = []): static
    {
        return $this->add(
            InlineQueryResultContact::default()
                ->setId($id ?? InlineFactory::randId())
                ->setPhoneNumber($phoneNumber)
                ->setFirstName($firstName)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a Game.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultgame
     */
    public function game(?string $id, string $gameShortName, ?InlineKeyboardMarkupFactory $replyMarkup = null): static
    {
        return $this->add(
            InlineQueryResultGame::default()
                ->setId($id ?? InlineFactory::randId())
                ->setGameShortName($gameShortName)
                ->setReplyMarkup($replyMarkup?->button)
        );
    }

    /**
     * Represents a link to a file
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultdocument
     */
    public function document(?string $id, string $title, string $documentUrl, string $mimeType, array $params = []): static
    {
        if (Network::IsValidUrl($documentUrl) === false) {
            throw new TelegramParamException('Invalid document url');
        }

        return $this->add(
            InlineQueryResultDocument::default()
                ->setId($id ?? InlineFactory::randId())
                ->setTitle($title)
                ->setDocumentUrl($documentUrl)
                ->setMimeType($mimeType)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to an animated GIF file.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultgif
     */
    public function gif(?string $id, string $gifUrl, string $thumbnailUrl, array $params = []): static
    {
        if (Network::IsValidUrl($gifUrl) === false) {
            throw new TelegramParamException('Invalid gif url');
        }
        if (Network::IsValidUrl($thumbnailUrl) === false) {
            throw new TelegramParamException('Invalid thumbnail url');
        }

        return $this->add(
            InlineQueryResultGif::default()
                ->setId($id ?? InlineFactory::randId())
                ->setGifUrl($gifUrl)
                ->setThumbnailUrl($thumbnailUrl)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a location on a map.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultlocation
     */
    public function location(?string $id, float $latitude, float $longitude, string $title, array $params = []): static
    {
        return $this->add(
            InlineQueryResultLocation::default()
                ->setId($id ?? InlineFactory::randId())
                ->setLatitude($latitude)
                ->setLongitude($longitude)
                ->setTitle($title)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound).
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
     */
    public function mpeg4Gif(?string $id, string $mpeg4Url, string $thumbnailUrl, array $params = []): static
    {
        if (Network::IsValidUrl($mpeg4Url) === false) {
            throw new TelegramParamException('Invalid mpeg4 url');
        }
        if (Network::IsValidUrl($thumbnailUrl) === false) {
            throw new TelegramParamException('Invalid thumbnail url');
        }

        return $this->add(
            InlineQueryResultMpeg4Gif::default()
                ->setId($id ?? InlineFactory::randId())
                ->setMpeg4Url($mpeg4Url)
                ->setThumbnailUrl($thumbnailUrl)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a photo.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultphoto
     */
    public function photo(?string $id, string $photoUrl, string $thumbnailUrl, array $params = []): static
    {
        if (Network::IsValidUrl($photoUrl) === false) {
            throw new TelegramParamException('Invalid photo url');
        }
        if (Network::IsValidUrl($thumbnailUrl) === false) {
            throw new TelegramParamException('Invalid thumbnail url');
        }

        return $this->add(
            InlineQueryResultPhoto::default()
                ->setId($id ?? InlineFactory::randId())
                ->setPhotoUrl($photoUrl)
                ->setThumbnailUrl($thumbnailUrl)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a venue.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultvenue
     */
    public function venue(?string $id, float $latitude, float $longitude, string $title, string $address, array $params = []): static
    {
        return $this->add(
            InlineQueryResultVenue::default()
                ->setId($id ?? InlineFactory::randId())
                ->setLatitude($latitude)
                ->setLongitude($longitude)
                ->setTitle($title)
                ->setAddress($address)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a page containing an embedded video player or a video file.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultvideo
     */
    public function video(?string $id, string $videoUrl, string $mimeType, string $thumbUrl, string $title, array $params = []): static
    {
        if (Network::IsValidUrl($videoUrl) === false) {
            throw new TelegramParamException('Invalid video url');
        }
        if (Network::IsValidUrl($thumbUrl) === false) {
            throw new TelegramParamException('Invalid thumbnail url');
        }

        return $this->add(
            InlineQueryResultVideo::default()
                ->setId($id ?? InlineFactory::randId())
                ->setVideoUrl($videoUrl)
                ->setMimeType($mimeType)
                ->setThumbnailUrl($thumbUrl)
                ->setTitle($title)
                ->magicSetter($params)
        );
    }

    /**
     * Represents a link to a voice recording in an .OGG container encoded with OPUS.
     *
     * @see https://core.telegram.org/bots/api#inlinequeryresultvoice
     */
    public function voice(?string $id, string $voiceUrl, string $title, array $params = []): static
    {
        if (Network::IsValidUrl($voiceUrl) === false) {
            throw new TelegramParamException('Invalid voice url');
        }

        return $this->add(
            InlineQueryResultVoice::default()
                ->setId($id ?? InlineFactory::randId())
                ->setVoiceUrl($voiceUrl)
                ->setTitle($title)
                ->magicSetter($params)
        );
    }

    protected function getArray(): array
    {
        return $this->all();
    }
}
