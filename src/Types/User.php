<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a Telegram user or bot.
 *
 * @property int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property bool $is_bot True, if this user is a bot
 * @property string $first_name User's or bot's first name
 * @property ?string $last_name Optional. User's or bot's last name
 * @property ?string $username Optional. User's or bot's username
 * @property ?string $language_code Optional. IETF language tag of the user's language
 * @property ?bool $is_premium Optional. True, if this user is a Telegram Premium user
 * @property ?bool $added_to_attachment_menu Optional. True, if this user added the bot to the attachment menu
 * @property ?bool $can_join_groups Optional. True, if the bot can be invited to groups. Returned only in getMe.
 * @property ?bool $can_read_all_group_messages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
 * @property ?bool $supports_inline_queries Optional. True, if the bot supports inline queries. Returned only in getMe.
 *
 * @method int id()
 * @method bool isBot()
 * @method string firstName()
 * @method ?string lastName()
 * @method ?string username()
 * @method ?string languageCode()
 * @method ?bool isPremium()
 * @method ?bool addedToAttachmentMenu()
 * @method ?bool canJoinGroups()
 * @method ?bool canReadAllGroupMessages()
 * @method ?bool supportsInlineQueries()
 *
 * @method static setId(int $id)
 * @method static setIsBot(bool $isBot)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(?string $lastName)
 * @method static setUsername(?string $username)
 * @method static setLanguageCode(?string $languageCode)
 * @method static setIsPremium(?bool $isPremium)
 * @method static setAddedToAttachmentMenu(?bool $addedToAttachmentMenu)
 * @method static setCanJoinGroups(?bool $canJoinGroups)
 * @method static setCanReadAllGroupMessages(?bool $canReadAllGroupMessages)
 * @method static setSupportsInlineQueries(?bool $supportsInlineQueries)
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                          => FieldType::single('integer'),
            'is_bot'                      => FieldType::single('boolean'),
            'first_name'                  => FieldType::single('string'),
            'last_name'                   => FieldType::optional('string'),
            'username'                    => FieldType::optional('string'),
            'language_code'               => FieldType::optional('string'),
            'is_premium'                  => FieldType::optional('boolean'),
            'added_to_attachment_menu'    => FieldType::optional('boolean'),
            'can_join_groups'             => FieldType::optional('boolean'),
            'can_read_all_group_messages' => FieldType::optional('boolean'),
            'supports_inline_queries'     => FieldType::optional('boolean'),
        ];
    }
}
