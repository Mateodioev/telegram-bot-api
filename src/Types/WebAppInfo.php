<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes a Web App.
 *
 * @property string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
 *
 * @method string url()
 *
 * @method static setUrl(string $url)
 *
 * @see https://core.telegram.org/bots/api#webappinfo
 */
class WebAppInfo extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'url' => FieldType::single('string'),
        ];
    }
}
