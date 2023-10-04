<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
 *
 * @property ?bool $from_request Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
 * @property ?string $web_app_name Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
 * @property ?bool $from_attachment_menu Optional. True, if the access was granted when the bot was added to the attachment or side menu
 *
 * @method ?bool fromRequest()
 * @method ?string webAppName()
 * @method ?bool fromAttachmentMenu()
 *
 * @method static setFromRequest(?bool $fromRequest)
 * @method static setWebAppName(?string $webAppName)
 * @method static setFromAttachmentMenu(?bool $fromAttachmentMenu)
 *
 * @see https://core.telegram.org/bots/api#writeaccessallowed
 */
class WriteAccessAllowed extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'from_request'         => FieldType::optional('boolean'),
            'web_app_name'         => FieldType::optional('string'),
            'from_attachment_menu' => FieldType::optional('boolean'),
        ];
    }
}
