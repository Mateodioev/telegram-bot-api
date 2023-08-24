<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the attachment menu or launching a Web App from a link.
 *
 * @property ?string $web_app_name Optional. Name of the Web App which was launched from a link
 *
 * @method ?string webAppName()
 *
 * @method static setWebAppName(?string $webAppName)
 *
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 */
class WriteAccessAllowed extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'web_app_name' => FieldType::optional('string'),
        ];
    }
}
