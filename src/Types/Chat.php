<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a chat.
 * 
 * @property integer $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string $type Type of chat, can be either “private”, “group”, “supergroup” or “channel”
 * @property string $title Optional. Title, for supergroups, channels and group chats
 * @property string $username Optional. Username, for private chats, supergroups and channels if available
 * @property string $first_name Optional. First name of the other party in a private chat
 * @property string $last_name Optional. Last name of the other party in a private chat
 * @property boolean $is_forum Optional. True, if the supergroup chat is a forum (has [topics](https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups) enabled)
 * @property ChatPhoto $photo Optional. Chat photo. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property array $active_usernames Optional. If non-empty, the list of all [active chat usernames](https://telegram.org/blog/topics-in-groups-collectible-usernames#collectible-usernames); for private chats, supergroups and channels. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property string $emoji_status_custom_emoji_id Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property string $bio Optional. Bio of the other party in a private chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to use `tg://user?id=<user_id>` links only in chats with the user. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $join_by_request Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property string $description Optional. Description, for groups, supergroups and channel chats. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property string $invite_link Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property Message $pinned_message Optional. The most recent pinned message (by sending date). Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property ChatPermissions $permissions Optional. Default chat member permissions, for groups and supergroups. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property integer $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property integer $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property string $sticker_set_name Optional. For supergroups, name of group sticker set. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property boolean $can_set_sticker_set Optional. True, if the bot can change the group sticker set. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property integer $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * @property ChatLocation $location Optional. For supergroups, the location to which the supergroup is connected. Returned only in [getChat](https://core.telegram.org/bots/api#getchat).
 * 
 * @method integer          id()
 * @method string           type()
 * @method ?string          title()
 * @method ?string          username()
 * @method ?string          firstName()
 * @method ?string          lastName()
 * @method ?boolean         isForum()
 * @method ?ChatPhoto       photo()
 * @method ?array           activeUsernames()
 * @method ?string          emojiStatusCustomEmojiId()
 * @method ?string          bio()
 * @method ?boolean         hasPrivateForwards()
 * @method ?boolean         hasRestrictedVoiceAndVideoMessages()
 * @method ?boolean         joinToSendMessages()
 * @method ?boolean         joinByRequest()
 * @method ?string          description()
 * @method ?string          inviteLink()
 * @method ?Message         pinnedMessage()
 * @method ?ChatPermissions permissions()
 * @method ?integer         slowModeDelay()
 * @method ?integer         messageAutodeleteTime()
 * @method ?boolean         hasAggressiveAntiSpamEnabled()
 * @method ?boolean         hasHiddenMembers()
 * @method ?boolean         hasProtectedContent()
 * @method ?string          stickerSetName()
 * @method ?boolean         canSetStickerSet()
 * @method ?integer         linkedChatId()
 * @method ?ChatLocation    location()
 * 
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends baseType
{
    protected array $fields = [
        'id'                                      => 'integer',
        'type'                                    => 'string',
        'title'                                   => 'string',
        'username'                                => 'string',
        'first_name'                              => 'string',
        'last_name'                               => 'string',
        'is_forum'                                => 'boolean',
        'photo'                                   => ChatPhoto::class,
        'active_usernames'                        => 'array',
        'emoji_status_custom_emoji_id'            => 'string',
        'bio'                                     => 'string',
        'has_private_forwards'                    => 'boolean',
        'has_restricted_voice_and_video_messages' => 'boolean',
        'join_to_send_messages'                   => 'boolean',
        'join_by_request'                         => 'boolean',
        'description'                             => 'string',
        'invite_link'                             => 'string',
        'pinned_message'                          => Message::class,
        'permissiones'                            => ChatPermissions::class,
        'slow_mode_delay'                         => 'integer',
        'message_auto_delete_time'                => 'integer',
        'has_aggressive_anti_spam_enabled'        => 'boolean',
        'has_hidden_members'                      => 'boolean',
        'has_protected_content'                   => 'boolean',
        'sticker_set_name'                        => 'string',
        'can_set_sticker_set'                     => 'boolean',
        'linked_chat_id'                          => 'integer',
        'location'                                => ChatLocation::class
    ];
}
