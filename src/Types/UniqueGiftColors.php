<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains information about the color scheme for a user's name, message replies and link previews based on a unique gift.
 *
 * @property string $model_custom_emoji_id Custom emoji identifier of the unique gift's model
 * @property string $symbol_custom_emoji_id Custom emoji identifier of the unique gift's symbol
 * @property int $light_theme_main_color Main color used in light themes; RGB format
 * @property int[] $light_theme_other_colors List of 1-3 additional colors used in light themes; RGB format
 * @property int $dark_theme_main_color Main color used in dark themes; RGB format
 * @property int[] $dark_theme_other_colors List of 1-3 additional colors used in dark themes; RGB format
 *
 * @method string modelCustomEmojiId()
 * @method string symbolCustomEmojiId()
 * @method int lightThemeMainColor()
 * @method int[] lightThemeOtherColors()
 * @method int darkThemeMainColor()
 * @method int[] darkThemeOtherColors()
 *
 * @method static setModelCustomEmojiId(string $modelCustomEmojiId)
 * @method static setSymbolCustomEmojiId(string $symbolCustomEmojiId)
 * @method static setLightThemeMainColor(int $lightThemeMainColor)
 * @method static setLightThemeOtherColors(int[] $lightThemeOtherColors)
 * @method static setDarkThemeMainColor(int $darkThemeMainColor)
 * @method static setDarkThemeOtherColors(int[] $darkThemeOtherColors)
 *
 * @see https://core.telegram.org/bots/api#uniquegiftcolors
 */
class UniqueGiftColors extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'model_custom_emoji_id'    => FieldType::single('string'),
            'symbol_custom_emoji_id'   => FieldType::single('string'),
            'light_theme_main_color'   => FieldType::single('integer'),
            'light_theme_other_colors' => FieldType::array('integer'),
            'dark_theme_main_color'    => FieldType::single('integer'),
            'dark_theme_other_colors'  => FieldType::array('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
