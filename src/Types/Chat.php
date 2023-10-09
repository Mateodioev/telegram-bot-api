<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a chat.
 *
 * @property int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string $type Type of chat, can be either "private", "group", "supergroup" or "channel"
 * @property string|null $title Optional. Title, for supergroups, channels and group chats
 * @property string|null $username Optional. Username, for private chats, supergroups and channels if available
 * @property string|null $first_name Optional. First name of the other party in a private chat
 * @property string|null $last_name Optional. Last name of the other party in a private chat
 * @property bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
 * @property ChatPhoto|null $photo Optional. Chat photo. Returned only in getChat.
 * @property string[]|null $active_usernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
 * @property string|null $emoji_status_custom_emoji_id Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat.
 * @property int|null $emoji_status_expiration_date Optional. Expiration date of the emoji status of the other party in a private chat in Unix time, if any. Returned only in getChat.
 * @property string|null $bio Optional. Bio of the other party in a private chat. Returned only in getChat.
 * @property bool|null $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
 * @property bool|null $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
 * @property bool|null $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
 * @property bool|null $join_by_request Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
 * @property string|null $description Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
 * @property string|null $invite_link Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
 * @property Message|null $pinned_message Optional. The most recent pinned message (by sending date). Returned only in getChat.
 * @property ChatPermissions|null $permissions Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
 * @property int|null $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in getChat.
 * @property int|null $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
 * @property bool|null $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
 * @property bool|null $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
 * @property bool|null $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
 * @property string|null $sticker_set_name Optional. For supergroups, name of group sticker set. Returned only in getChat.
 * @property bool|null $can_set_sticker_set Optional. True, if the bot can change the group sticker set. Returned only in getChat.
 * @property int|null $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
 * @property ChatLocation|null $location Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
 *
 * @method int id()
 * @method string type()
 * @method string|null title()
 * @method string|null username()
 * @method string|null firstName()
 * @method string|null lastName()
 * @method bool|null isForum()
 * @method ChatPhoto|null photo()
 * @method string[]|null activeUsernames()
 * @method string|null emojiStatusCustomEmojiId()
 * @method int|null emojiStatusExpirationDate()
 * @method string|null bio()
 * @method bool|null hasPrivateForwards()
 * @method bool|null hasRestrictedVoiceAndVideoMessages()
 * @method bool|null joinToSendMessages()
 * @method bool|null joinByRequest()
 * @method string|null description()
 * @method string|null inviteLink()
 * @method Message|null pinnedMessage()
 * @method ChatPermissions|null permissions()
 * @method int|null slowModeDelay()
 * @method int|null messageAutoDeleteTime()
 * @method bool|null hasAggressiveAntiSpamEnabled()
 * @method bool|null hasHiddenMembers()
 * @method bool|null hasProtectedContent()
 * @method string|null stickerSetName()
 * @method bool|null canSetStickerSet()
 * @method int|null linkedChatId()
 * @method ChatLocation|null location()
 *
 * @method static setId(int $id)
 * @method static setType(string $type)
 * @method static setTitle(string|null $title)
 * @method static setUsername(string|null $username)
 * @method static setFirstName(string|null $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setIsForum(bool|null $isForum)
 * @method static setPhoto(ChatPhoto|null $photo)
 * @method static setActiveUsernames(string[]|null $activeUsernames)
 * @method static setEmojiStatusCustomEmojiId(string|null $emojiStatusCustomEmojiId)
 * @method static setEmojiStatusExpirationDate(int|null $emojiStatusExpirationDate)
 * @method static setBio(string|null $bio)
 * @method static setHasPrivateForwards(bool|null $hasPrivateForwards)
 * @method static setHasRestrictedVoiceAndVideoMessages(bool|null $hasRestrictedVoiceAndVideoMessages)
 * @method static setJoinToSendMessages(bool|null $joinToSendMessages)
 * @method static setJoinByRequest(bool|null $joinByRequest)
 * @method static setDescription(string|null $description)
 * @method static setInviteLink(string|null $inviteLink)
 * @method static setPinnedMessage(Message|null $pinnedMessage)
 * @method static setPermissions(ChatPermissions|null $permissions)
 * @method static setSlowModeDelay(int|null $slowModeDelay)
 * @method static setMessageAutoDeleteTime(int|null $messageAutoDeleteTime)
 * @method static setHasAggressiveAntiSpamEnabled(bool|null $hasAggressiveAntiSpamEnabled)
 * @method static setHasHiddenMembers(bool|null $hasHiddenMembers)
 * @method static setHasProtectedContent(bool|null $hasProtectedContent)
 * @method static setStickerSetName(string|null $stickerSetName)
 * @method static setCanSetStickerSet(bool|null $canSetStickerSet)
 * @method static setLinkedChatId(int|null $linkedChatId)
 * @method static setLocation(ChatLocation|null $location)
 *
 * @see https://core.telegram.org/bots/api#chat
 */
class Chat extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'id'                                      => FieldType::single('integer'),
            'type'                                    => FieldType::single('string'),
            'title'                                   => FieldType::optional('string'),
            'username'                                => FieldType::optional('string'),
            'first_name'                              => FieldType::optional('string'),
            'last_name'                               => FieldType::optional('string'),
            'is_forum'                                => FieldType::optional('boolean'),
            'photo'                                   => FieldType::optional(ChatPhoto::class),
            'active_usernames'                        => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
            'emoji_status_custom_emoji_id'            => FieldType::optional('string'),
            'emoji_status_expiration_date'            => FieldType::optional('integer'),
            'bio'                                     => FieldType::optional('string'),
            'has_private_forwards'                    => FieldType::optional('boolean'),
            'has_restricted_voice_and_video_messages' => FieldType::optional('boolean'),
            'join_to_send_messages'                   => FieldType::optional('boolean'),
            'join_by_request'                         => FieldType::optional('boolean'),
            'description'                             => FieldType::optional('string'),
            'invite_link'                             => FieldType::optional('string'),
            'pinned_message'                          => FieldType::optional(Message::class),
            'permissions'                             => FieldType::optional(ChatPermissions::class),
            'slow_mode_delay'                         => FieldType::optional('integer'),
            'message_auto_delete_time'                => FieldType::optional('integer'),
            'has_aggressive_anti_spam_enabled'        => FieldType::optional('boolean'),
            'has_hidden_members'                      => FieldType::optional('boolean'),
            'has_protected_content'                   => FieldType::optional('boolean'),
            'sticker_set_name'                        => FieldType::optional('string'),
            'can_set_sticker_set'                     => FieldType::optional('boolean'),
            'linked_chat_id'                          => FieldType::optional('integer'),
            'location'                                => FieldType::optional(ChatLocation::class),
            // legacy params
            'all_members_are_administrators'          => FieldType::optional('boolean'),
        ];
    }
}
