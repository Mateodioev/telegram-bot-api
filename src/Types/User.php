<?php

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\ParseMode;

/**
 * This object represents a Telegram user or bot.
 * 
 * @property integer  $id                          Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property boolean  $is_bot                      True, if this user is a bot
 * @property string   $first_name                  User's or bot's first name
 * @property ?string   $last_name                  Optional. User's or bot's last name
 * @property ?string  $username                    Optional. User's or bot's username
 * @property ?string  $language_code               Optional. [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) of the user's language
 * @property ?boolean $is_premium                  Optional. True, if this user is a Telegram Premium user
 * @property ?boolean $added_to_attachment_menu    Optional. True, if this user added the bot to the attachment menu
 * @property ?boolean $can_join_groups             Optional. True, if the bot can be invited to groups. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property ?boolean $can_read_all_group_messages Optional. True, if [privacy mode](https://core.telegram.org/bots/features#privacy-mode) is disabled for the bot. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property ?boolean $supports_inline_queries     Optional. True, if the bot supports inline queries. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * 
 * @method integer  id()
 * @method boolean  isBot()
 * @method string   firstName()
 * @method ?string  lastName()
 * @method ?string  username()
 * @method ?string  languageCode()
 * @method ?boolean isPremium()
 * @method ?boolean addedToAttachmentMenu()
 * @method ?boolean canJoinGroups()
 * @method ?boolean canReadAllGroupMessages()
 * @method ?boolean supportsInlineQueries()
 * 
 * @method static setId(integer $id)
 * @method static setIsBot(boolean $isBot)
 * @method static setFirstName(string $firstName)
 * @method static setLastName(string $lastName)
 * @method static setUsername(string $username)
 * @method static setLanguageCode(string $languageCode)
 * @method static setIsPremium(boolean $isPremium)
 * @method static setAddedToAttachmentMenu(boolean $addedToAttachmentMenu)
 * @method static setCanJoinGroups(boolean $canJoinGroups)
 * @method static setCanReadAllGroupMessages(boolean $canReadAllGroupMessages)
 * @method static setSupportsInlineQueries(boolean $supportsInlineQueries)
 * 
 * @see https://core.telegram.org/bots/api#user
 */
class User extends baseType
{
    protected array $fields = [
        'id'                          => 'integer',
        'is_bot'                      => 'boolean',
        'first_name'                  => 'string',
        'last_name'                   => 'string',
        'username'                    => 'string',
        'language_code'               => 'string',
        'is_premium'                  => 'boolean',
        'added_to_attachment_menu'    => 'boolean',
        'can_join_groups'             => 'boolean',
        'can_read_all_group_messages' => 'boolean',
        'supports_inline_queries'     => 'boolean',
    ];

    /**
     * Get inline mention for this user. See {@see self::getName()} for name syntax
     */
    public function mention(ParseMode $mode = ParseMode::HTML): string
    {
        if ($mode == ParseMode::HTML) {
            // <a href='tg://user?id=USER_ID'>First name + Last Name</a>
            return '<a href=\'tg://user?id=' . $this->properties['id'] . '\'>' . ParseMode::removeHtml($this->getName()) . '</a>';
        }

        // [First name + Last Name](tg://user?id=USER_ID)
        return '[' . $this->getName() . '](tg://user?id=' . $this->properties['id'] . ')';
    }

    /**
     * Get user full name
     */
    public function getName(): string
    {
        // return $this->first_name . ' ' . $this->last_name;
        // Avoid call magic methods

        return \trim($this->properties['first_name'] . ' ' . $this->properties()['last_name']);
    }
}
