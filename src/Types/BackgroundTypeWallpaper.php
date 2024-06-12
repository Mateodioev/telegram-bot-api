<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The background is a wallpaper in the JPEG format.
 *
 * @property string $type Type of the background, always "wallpaper"
 * @property Document $document Document with the wallpaper
 * @property int $dark_theme_dimming Dimming of the background in dark themes, as a percentage; 0-100
 * @property bool|null $is_blurred Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
 * @property bool|null $is_moving Optional. True, if the background moves slightly when the device is tilted
 *
 * @method string type()
 * @method Document document()
 * @method int darkThemeDimming()
 * @method bool|null isBlurred()
 * @method bool|null isMoving()
 *
 * @method static setType(string $type)
 * @method static setDocument(Document $document)
 * @method static setDarkThemeDimming(int $darkThemeDimming)
 * @method static setIsBlurred(bool|null $isBlurred)
 * @method static setIsMoving(bool|null $isMoving)
 *
 * @see https://core.telegram.org/bots/api#backgroundtypewallpaper
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    protected function boot(): void
    {
        $this->fields = [
            'type'               => FieldType::single('string'),
            'document'           => FieldType::single(Document::class),
            'dark_theme_dimming' => FieldType::single('integer'),
            'is_blurred'         => FieldType::optional('boolean'),
            'is_moving'          => FieldType::optional('boolean'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('wallpaper');
    }
}
