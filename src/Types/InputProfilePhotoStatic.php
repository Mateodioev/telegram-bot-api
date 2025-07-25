<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * A static profile photo in the .JPG format.
 *
 * @property string $type Type of the profile photo, must be static
 * @property string $photo The static profile photo. Profile photos can't be reused and can only be uploaded as a new file, so you can pass "attach://<file_attach_name>" if the photo was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 *
 * @method string type()
 * @method string photo()
 *
 * @method static setType(string $type)
 * @method static setPhoto(string $photo)
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotostatic
 */
class InputProfilePhotoStatic extends InputProfilePhoto
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'photo' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
