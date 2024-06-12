<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object defines the criteria used to request suitable users. Information about the selected users will be shared with the bot when the corresponding button is pressed. More about requesting users: https://core.telegram.org/bots/features#chat-and-user-selection
 *
 * @property int $request_id Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
 * @property bool|null $user_is_bot Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
 * @property bool|null $user_is_premium Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
 * @property int|null $max_quantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
 * @property bool|null $request_name Optional. Pass True to request the users' first and last names
 * @property bool|null $request_username Optional. Pass True to request the users' usernames
 * @property bool|null $request_photo Optional. Pass True to request the users' photos
 *
 * @method int requestId()
 * @method bool|null userIsBot()
 * @method bool|null userIsPremium()
 * @method int|null maxQuantity()
 * @method bool|null requestName()
 * @method bool|null requestUsername()
 * @method bool|null requestPhoto()
 *
 * @method static setRequestId(int $requestId)
 * @method static setUserIsBot(bool|null $userIsBot)
 * @method static setUserIsPremium(bool|null $userIsPremium)
 * @method static setMaxQuantity(int|null $maxQuantity)
 * @method static setRequestName(bool|null $requestName)
 * @method static setRequestUsername(bool|null $requestUsername)
 * @method static setRequestPhoto(bool|null $requestPhoto)
 *
 * @see https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 */
class KeyboardButtonRequestUsers extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'request_id'       => FieldType::single('integer'),
            'user_is_bot'      => FieldType::optional('boolean'),
            'user_is_premium'  => FieldType::optional('boolean'),
            'max_quantity'     => FieldType::optional('integer'),
            'request_name'     => FieldType::optional('boolean'),
            'request_username' => FieldType::optional('boolean'),
            'request_photo'    => FieldType::optional('boolean'),
        ];
    }
}
