<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * At most one of the optional fields can be present in any given object.
 *
 * @property Animation|null $animation Optional. Media is an animation, information about the animation
 * @property Audio|null $audio Optional. Media is an audio file, information about the file; currently, can't be received in a poll option
 * @property Document|null $document Optional. Media is a general file, information about the file; currently, can't be received in a poll option
 * @property LivePhoto|null $live_photo Optional. Media is a live photo, information about the live photo
 * @property Location|null $location Optional. Media is a shared location, information about the location
 * @property PhotoSize[]|null $photo Optional. Media is a photo, available sizes of the photo
 * @property Sticker|null $sticker Optional. Media is a sticker, information about the sticker; currently, for poll options only
 * @property Venue|null $venue Optional. Media is a venue, information about the venue
 * @property Video|null $video Optional. Media is a video, information about the video
 *
 * @method Animation|null animation()
 * @method Audio|null audio()
 * @method Document|null document()
 * @method LivePhoto|null livePhoto()
 * @method Location|null location()
 * @method PhotoSize[]|null photo()
 * @method Sticker|null sticker()
 * @method Venue|null venue()
 * @method Video|null video()
 *
 * @method static setAnimation(Animation|null $animation)
 * @method static setAudio(Audio|null $audio)
 * @method static setDocument(Document|null $document)
 * @method static setLivePhoto(LivePhoto|null $livePhoto)
 * @method static setLocation(Location|null $location)
 * @method static setPhoto(PhotoSize[]|null $photo)
 * @method static setSticker(Sticker|null $sticker)
 * @method static setVenue(Venue|null $venue)
 * @method static setVideo(Video|null $video)
 *
 * @see https://core.telegram.org/bots/api#pollmedia
 */
class PollMedia extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'animation'  => FieldType::optional(Animation::class),
            'audio'      => FieldType::optional(Audio::class),
            'document'   => FieldType::optional(Document::class),
            'live_photo' => FieldType::optional(LivePhoto::class),
            'location'   => FieldType::optional(Location::class),
            'photo'      => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'sticker'    => FieldType::optional(Sticker::class),
            'venue'      => FieldType::optional(Venue::class),
            'video'      => FieldType::optional(Video::class),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
