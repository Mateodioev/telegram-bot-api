<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The paid media to send is a live photo.
 *
 * @property string $type Type of the media, must be live_photo
 * @property InputFile|string $media Video of the live photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files. Sending live photos by a URL is currently unsupported.
 * @property string $photo The static photo to send. Pass a file_id to send a file that exists on the Telegram servers (recommended) or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files. Sending live photos by a URL is currently unsupported.
 *
 * @method string type()
 * @method InputFile|string media()
 * @method string photo()
 *
 * @method static setType(string $type)
 * @method static setMedia(InputFile|string $media)
 * @method static setPhoto(string $photo)
 *
 * @see https://core.telegram.org/bots/api#inputpaidmedialivephoto
 */
class InputPaidMediaLivePhoto extends InputPaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'media' => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'photo' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('live_photo');
    }
}
