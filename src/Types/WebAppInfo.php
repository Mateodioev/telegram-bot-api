<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * Describes a Web App.
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
