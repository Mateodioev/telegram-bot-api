<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Describes a video to post as a story.
 *
 * @property string $type Type of the content, must be video
 * @property string $video The video to post as a story. The video must be of the size 720x1280, streamable, encoded with H.265 codec, with key frames added each second in the MPEG4 format, and must not exceed 30 MB. The video can't be reused and can only be uploaded as a new file, so you can pass "attach://<file_attach_name>" if the video was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property double|null $duration Optional. Precise duration of the video in seconds; 0-60
 * @property double|null $cover_frame_timestamp Optional. Timestamp in seconds of the frame that will be used as the static cover for the story. Defaults to 0.0.
 * @property bool|null $is_animation Optional. Pass True if the video has no sound
 *
 * @method string type()
 * @method string video()
 * @method double|null duration()
 * @method double|null coverFrameTimestamp()
 * @method bool|null isAnimation()
 *
 * @method static setType(string $type)
 * @method static setVideo(string $video)
 * @method static setDuration(double|null $duration)
 * @method static setCoverFrameTimestamp(double|null $coverFrameTimestamp)
 * @method static setIsAnimation(bool|null $isAnimation)
 *
 * @see https://core.telegram.org/bots/api#inputstorycontentvideo
 */
class InputStoryContentVideo extends InputStoryContent
{
    protected function boot(): void
    {
        $this->fields = [
            'type'                  => FieldType::single('string'),
            'video'                 => FieldType::single('string'),
            'duration'              => FieldType::optional('double'),
            'cover_frame_timestamp' => FieldType::optional('double'),
            'is_animation'          => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())
            ->setType('video');
    }
}
