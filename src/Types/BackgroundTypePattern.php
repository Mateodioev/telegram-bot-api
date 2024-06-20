<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * The background is a PNG or TGV (gzipped subset of SVG with MIME type "application/x-tgwallpattern") pattern to be combined with the background fill chosen by the user.
 *
 * @property string $type Type of the background, always "pattern"
 * @property Document $document Document with the pattern
 * @property BackgroundFill $fill The background fill that is combined with the pattern
 * @property int $intensity Intensity of the pattern when it is shown above the filled background; 0-100
 * @property bool|null $is_inverted Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
 * @property bool|null $is_moving Optional. True, if the background moves slightly when the device is tilted
 *
 * @method string type()
 * @method Document document()
 * @method BackgroundFill fill()
 * @method int intensity()
 * @method bool|null isInverted()
 * @method bool|null isMoving()
 *
 * @method static setType(string $type)
 * @method static setDocument(Document $document)
 * @method static setFill(BackgroundFill $fill)
 * @method static setIntensity(int $intensity)
 * @method static setIsInverted(bool|null $isInverted)
 * @method static setIsMoving(bool|null $isMoving)
 *
 * @see https://core.telegram.org/bots/api#backgroundtypepattern
 */
class BackgroundTypePattern extends BackgroundType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'type'        => FieldType::single('string'),
            'document'    => FieldType::single(Document::class),
            'fill'        => FieldType::single(BackgroundFill::class),
            'intensity'   => FieldType::single('integer'),
            'is_inverted' => FieldType::optional('boolean'),
            'is_moving'   => FieldType::optional('boolean'),
        ];
    }

    public static function default(): static
    {
        return (new static())
            ->setType('pattern');
    }
}
