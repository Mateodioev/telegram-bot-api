<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;
use Mateodioev\Bots\Telegram\Config\FieldsStorage;

/**
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
 *
 * @property int $user_id Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit integers or double-precision float types are safe for storing these identifiers. The bot may not have access to the user and could be unable to use this identifier, unless the user is already known to the bot by some other means.
 * @property string|null $first_name Optional. First name of the user, if the name was requested by the bot
 * @property string|null $last_name Optional. Last name of the user, if the name was requested by the bot
 * @property string|null $username Optional. Username of the user, if the username was requested by the bot
 * @property PhotoSize[]|null $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
 *
 * @method int userId()
 * @method string|null firstName()
 * @method string|null lastName()
 * @method string|null username()
 * @method PhotoSize[]|null photo()
 *
 * @method static setUserId(int $userId)
 * @method static setFirstName(string|null $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setUsername(string|null $username)
 * @method static setPhoto(PhotoSize[]|null $photo)
 *
 * @see https://core.telegram.org/bots/api#shareduser
 */
class SharedUser extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'user_id'    => FieldType::single('integer'),
            'first_name' => FieldType::optional('string'),
            'last_name'  => FieldType::optional('string'),
            'username'   => FieldType::optional('string'),
            'photo'      => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
