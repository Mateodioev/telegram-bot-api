<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a photo to post as a story.
 *
 * @property string $type Type of the content, must be photo
 * @property string $photo The photo to post as a story. The photo must be of the size 1080x1920 and must not exceed 10 MB. The photo can't be reused and can only be uploaded as a new file, so you can pass "attach://<file_attach_name>" if the photo was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 *
 * @method string type()
 * @method string photo()
 *
 * @method static setType(string $type)
 * @method static setPhoto(string $photo)
 *
 * @see https://core.telegram.org/bots/api#inputstorycontentphoto
 */
class InputStoryContentPhoto extends InputStoryContent
{
    protected function boot(): void
    {
        $this->fields = [
            'type'  => FieldType::single('string'),
            'photo' => FieldType::single('string'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('photo');
    }
}
