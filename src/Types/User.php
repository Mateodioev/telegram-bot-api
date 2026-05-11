<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage, ParseMode};

/**
 * This object represents a Telegram user or bot.
 *
 * @property int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property bool $is_bot True, if this user is a bot
 * @property string $first_name User's or bot's first name
 * @property string|null $last_name Optional. User's or bot's last name
 * @property string|null $username Optional. User's or bot's username
 * @property string|null $language_code Optional. IETF language tag of the user's language
 * @property bool|null $is_premium Optional. True, if this user is a Telegram Premium user
 * @property bool|null $added_to_attachment_menu Optional. True, if this user added the bot to the attachment menu
 * @property bool|null $can_join_groups Optional. True, if the bot can be invited to groups. Returned only in getMe.
 * @property bool|null $can_read_all_group_messages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
 * @property bool|null $supports_guest_queries Optional. True, if the bot supports guest queries from chats it is not a member of. Returned only in getMe.
 * @property bool|null $supports_inline_queries Optional. True, if the bot supports inline queries. Returned only in getMe.
 * @property bool|null $can_connect_to_business Optional. True, if the bot can be connected to a user account to manage it. Returned only in getMe.
 * @property bool|null $has_main_web_app Optional. True, if the bot has a main Web App. Returned only in getMe.
 * @property bool|null $has_topics_enabled Optional. True, if the bot has forum topic mode enabled in private chats. Returned only in getMe.
 * @property bool|null $allows_users_to_create_topics Optional. True, if the bot allows users to create and delete topics in private chats. Returned only in getMe.
 * @property bool|null $can_manage_bots Optional. True, if other bots can be created to be controlled by the bot. Returned only in getMe.
 *
 * @method int id()
 * @method bool isBot()
 * @method string firstName()
 * @method string|null lastName()
 * @method string|null username()
 * @method string|null languageCode()
 * @method bool|null isPremium()
 * @method bool|null addedToAttachmentMenu()
 * @method bool|null canJoinGroups()
 * @method bool|null canReadAllGroupMessages()
 * @method bool|null supportsGuestQueries()
 * @method bool|null supportsInlineQueries()
 * @method bool|null canConnectToBusiness()
 * @method bool|null hasMainWebApp()
 * @method bool|null hasTopicsEnabled()
 * @method bool|null allowsUsersToCreateTopics()
 * @method bool|null canManageBots()
 *
 * @method static setId(int $id)
 * @method static setIsBot(bool $isBot)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setUsername(string|null $username)
 * @method static setLanguageCode(string|null $languageCode)
 * @method static setIsPremium(bool|null $isPremium)
 * @method static setAddedToAttachmentMenu(bool|null $addedToAttachmentMenu)
 * @method static setCanJoinGroups(bool|null $canJoinGroups)
 * @method static setCanReadAllGroupMessages(bool|null $canReadAllGroupMessages)
 * @method static setSupportsGuestQueries(bool|null $supportsGuestQueries)
 * @method static setSupportsInlineQueries(bool|null $supportsInlineQueries)
 * @method static setCanConnectToBusiness(bool|null $canConnectToBusiness)
 * @method static setHasMainWebApp(bool|null $hasMainWebApp)
 * @method static setHasTopicsEnabled(bool|null $hasTopicsEnabled)
 * @method static setAllowsUsersToCreateTopics(bool|null $allowsUsersToCreateTopics)
 * @method static setCanManageBots(bool|null $canManageBots)
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                            => FieldType::single('integer'),
            'is_bot'                        => FieldType::single('boolean'),
            'first_name'                    => FieldType::single('string'),
            'last_name'                     => FieldType::optional('string'),
            'username'                      => FieldType::optional('string'),
            'language_code'                 => FieldType::optional('string'),
            'is_premium'                    => FieldType::optional('boolean'),
            'added_to_attachment_menu'      => FieldType::optional('boolean'),
            'can_join_groups'               => FieldType::optional('boolean'),
            'can_read_all_group_messages'   => FieldType::optional('boolean'),
            'supports_guest_queries'        => FieldType::optional('boolean'),
            'supports_inline_queries'       => FieldType::optional('boolean'),
            'can_connect_to_business'       => FieldType::optional('boolean'),
            'has_main_web_app'              => FieldType::optional('boolean'),
            'has_topics_enabled'            => FieldType::optional('boolean'),
            'allows_users_to_create_topics' => FieldType::optional('boolean'),
            'can_manage_bots'               => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }

    /**
     * Get inline mention for this user. See {@see self::getName()} for name formatting.
     */
    public function mention(ParseMode $mode = ParseMode::HTML, ?string $customName = null): string
    {
        $name = $mode->scapeTags($customName ?? $this->getName());
        $id   = $this->properties['id'];

        if ($mode === ParseMode::HTML) {
            return "<a href=\"tg://user?id=$id\">$name</a>";
        }

        return "[$name](tg://user?id=$id)";
    }

    /**
     * Get first name and last name for this user.
     */
    public function getName(): string
    {
        return trim($this->properties['first_name'] . ' ' . $this->properties['last_name']);
    }
}
