<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * The paid media to send is a video.
 *
 * @property string $type Type of the media, must be video
 * @property string|InputFile $media File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property string|InputFile|null $thumbnail Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass "attach://<file_attach_name>" if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property string|InputFile|null $cover Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass "attach://<file_attach_name>" to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files: https://core.telegram.org/bots/api#sending-files
 * @property int|null $start_timestamp Optional. Start timestamp for the video in the message
 * @property int|null $width Optional. Video width
 * @property int|null $height Optional. Video height
 * @property int|null $duration Optional. Video duration in seconds
 * @property bool|null $supports_streaming Optional. Pass True if the uploaded video is suitable for streaming
 *
 * @method string type()
 * @method string|InputFile media()
 * @method InputFile|string|null thumbnail()
 * @method string|InputFile|null cover()
 * @method int|null startTimestamp()
 * @method int|null width()
 * @method int|null height()
 * @method int|null duration()
 * @method bool|null supportsStreaming()
 *
 * @method static setType(string $type)
 * @method static setMedia(string|InputFile $media)
 * @method static setThumbnail(InputFile|string|null $thumbnail)
 * @method static setCover(string|InputFile|null $cover)
 * @method static setStartTimestamp(int|null $startTimestamp)
 * @method static setWidth(int|null $width)
 * @method static setHeight(int|null $height)
 * @method static setDuration(int|null $duration)
 * @method static setSupportsStreaming(bool|null $supportsStreaming)
 *
 * @see https://core.telegram.org/bots/api#inputpaidmediavideo
 */
class InputPaidMediaVideo extends InputPaidMedia
{
    protected function boot(): void
    {
        $this->fields = [
            'type'               => FieldType::single('string'),
            'media'              => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'thumbnail'          => FieldType::mixed(),
            'cover'              => new FieldType(InputFile::class, allowArrays: false, allowNull: false, subTypes: ['string']),
            'start_timestamp'    => FieldType::optional('integer'),
            'width'              => FieldType::optional('integer'),
            'height'             => FieldType::optional('integer'),
            'duration'           => FieldType::optional('integer'),
            'supports_streaming' => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    public static function default(): static
    {
        return (new static())->setType('video');
    }
}
