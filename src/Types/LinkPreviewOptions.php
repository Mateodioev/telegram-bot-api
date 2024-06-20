<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes the options used for link preview generation.
 *
 * @property bool|null $is_disabled Optional. True, if the link preview is disabled
 * @property string|null $url Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
 * @property bool|null $prefer_small_media Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property bool|null $prefer_large_media Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
 * @property bool|null $show_above_text Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
 *
 * @method bool|null isDisabled()
 * @method string|null url()
 * @method bool|null preferSmallMedia()
 * @method bool|null preferLargeMedia()
 * @method bool|null showAboveText()
 *
 * @method static setIsDisabled(bool|null $isDisabled)
 * @method static setUrl(string|null $url)
 * @method static setPreferSmallMedia(bool|null $preferSmallMedia)
 * @method static setPreferLargeMedia(bool|null $preferLargeMedia)
 * @method static setShowAboveText(bool|null $showAboveText)
 *
 * @see https://core.telegram.org/bots/api#linkpreviewoptions
 */
class LinkPreviewOptions extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'is_disabled'        => FieldType::optional('boolean'),
            'url'                => FieldType::optional('string'),
            'prefer_small_media' => FieldType::optional('boolean'),
            'prefer_large_media' => FieldType::optional('boolean'),
            'show_above_text'    => FieldType::optional('boolean'),
        ];
    }
}
