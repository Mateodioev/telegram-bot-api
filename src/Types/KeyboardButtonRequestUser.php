<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared with the bot when the corresponding button is pressed. More about requesting users: https://core.telegram.org/bots/features#chat-and-user-selection
 *
 * @property int $request_id Signed 32-bit identifier of the request, which will be received back in the UserShared object. Must be unique within the message
 * @property ?bool $user_is_bot Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional restrictions are applied.
 * @property ?bool $user_is_premium Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no additional restrictions are applied.
 *
 * @method int requestId()
 * @method ?bool userIsBot()
 * @method ?bool userIsPremium()
 *
 * @method static setRequestId(int $requestId)
 * @method static setUserIsBot(?bool $userIsBot)
 * @method static setUserIsPremium(?bool $userIsPremium)
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 */
class KeyboardButtonRequestUser extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'      => FieldType::single('integer'),
            'user_is_bot'     => FieldType::optional('boolean'),
            'user_is_premium' => FieldType::optional('boolean'),
        ];
    }
}
