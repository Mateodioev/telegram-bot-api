<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents a live photo to be sent.
 *
 * @property string $type Type of the result, must be live_photo
 * @property InputFile|string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files. Sending live photos by a URL is currently unsupported.
 * @property InputFile|string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files. Sending live photos by a URL is currently unsupported.
 * @property string|null $caption Optional. Caption of the live photo to be sent, 0-1024 characters after entities parsing
 * @property string|null $parse_mode Optional. Mode for parsing entities in the live photo caption. See formatting options for more details.
 * @property MessageEntity[]|null $caption_entities Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
 * @property bool|null $show_caption_above_media Optional. Pass True, if the caption must be shown above the message media
 * @property bool|null $has_spoiler Optional. Pass True if the live photo needs to be covered with a spoiler animation
 *
 * @method string type()
 * @method InputFile|string media()
 * @method InputFile|string photo()
 * @method string|null caption()
 * @method string|null parseMode()
 * @method MessageEntity[]|null captionEntities()
 * @method bool|null showCaptionAboveMedia()
 * @method bool|null hasSpoiler()
 *
 * @method static setType(string $type)
 * @method static setMedia(InputFile|string $media)
 * @method static setPhoto(InputFile|string $photo)
 * @method static setCaption(string|null $caption)
 * @method static setParseMode(string|null $parseMode)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setShowCaptionAboveMedia(bool|null $showCaptionAboveMedia)
 * @method static setHasSpoiler(bool|null $hasSpoiler)
 *
 * @see https://core.telegram.org/bots/api#inputmedialivephoto
 */
class InputMediaLivePhoto extends InputPollMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                     => FieldType::single('string'),
            'media'                    => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'photo'                    => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'caption'                  => FieldType::optional('string'),
            'parse_mode'               => FieldType::optional('string'),
            'caption_entities'         => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'show_caption_above_media' => FieldType::optional('boolean'),
            'has_spoiler'              => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('live_photo');
    }
}
