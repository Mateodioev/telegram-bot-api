<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * An animated profile photo in the MPEG4 format.
 *
 * @property string $type Type of the profile photo, must be animated
 * @property string $animation The animated profile photo. Profile photos can't be reused and can only be uploaded as a new file, so you can pass "attach://<file_attach_name>" if the photo was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property double|null $main_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static profile photo. Defaults to 0.0.
 *
 * @method string type()
 * @method string animation()
 * @method double|null mainFrameTimestamp()
 *
 * @method static setType(string $type)
 * @method static setAnimation(string $animation)
 * @method static setMainFrameTimestamp(double|null $mainFrameTimestamp)
 *
 * @see https://core.telegram.org/bots/api#inputprofilephotoanimated
 */
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                 => FieldType::single('string'),
            'animation'            => FieldType::single('string'),
            'main_frame_timestamp' => FieldType::optional('double'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
