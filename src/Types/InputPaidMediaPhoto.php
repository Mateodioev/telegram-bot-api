<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The paid media to send is a photo.
 *
 * @property string $type Type of the media, must be photo
 * @property string|InputFile $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 *
 * @method string type()
 * @method string|InputFile media()
 *
 * @method static setType(string $type)
 * @method static setMedia(string|InputFile $media)
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediaphoto
 */
class InputPaidMediaPhoto extends InputPaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'media' => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('photo');
    }
}
