<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * This object contains full information about a chat.
 *
 * @property int $id Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property string $type Type of the chat, can be either "private", "group", "supergroup" or "channel"
 * @property string|null $title Optional. Title, for supergroups, channels and group chats
 * @property string|null $username Optional. Username, for private chats, supergroups and channels if available
 * @property string|null $first_name Optional. First name of the other party in a private chat
 * @property string|null $last_name Optional. Last name of the other party in a private chat
 * @property bool|null $is_forum Optional. True, if the supergroup chat is a forum (has topics enabled)
 * @property bool|null $is_direct_messages Optional. True, if the chat is the direct messages chat of a channel
 * @property int $accent_color_id Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview. See accent colors for more details.
 * @property int $max_reaction_count The maximum number of reactions that can be set on a message in the chat
 * @property ChatPhoto|null $photo Optional. Chat photo
 * @property string[]|null $active_usernames Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels
 * @property Birthdate|null $birthdate Optional. For private chats, the date of birth of the user
 * @property BusinessIntro|null $business_intro Optional. For private chats with business accounts, the intro of the business
 * @property BusinessLocation|null $business_location Optional. For private chats with business accounts, the location of the business
 * @property BusinessOpeningHours|null $business_opening_hours Optional. For private chats with business accounts, the opening hours of the business
 * @property Chat|null $personal_chat Optional. For private chats, the personal channel of the user
 * @property Chat|null $parent_chat Optional. Information about the corresponding channel chat; for direct messages chats only
 * @property ReactionType[]|null $available_reactions Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed.
 * @property string|null $background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header and link preview background
 * @property int|null $profile_accent_color_id Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more details.
 * @property string|null $profile_background_custom_emoji_id Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background
 * @property string|null $emoji_status_custom_emoji_id Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat
 * @property int|null $emoji_status_expiration_date Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any
 * @property string|null $bio Optional. Bio of the other party in a private chat
 * @property bool|null $has_private_forwards Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user
 * @property bool|null $has_restricted_voice_and_video_messages Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat
 * @property bool|null $join_to_send_messages Optional. True, if users need to join the supergroup before they can send messages
 * @property bool|null $join_by_request Optional. True, if all users directly joining the supergroup without using an invite link need to be approved by supergroup administrators
 * @property string|null $description Optional. Description, for groups, supergroups and channel chats
 * @property string|null $invite_link Optional. Primary invite link, for groups, supergroups and channel chats
 * @property Message|null $pinned_message Optional. The most recent pinned message (by sending date)
 * @property ChatPermissions|null $permissions Optional. Default chat member permissions, for groups and supergroups
 * @property AcceptedGiftTypes $accepted_gift_types Information about types of gifts that are accepted by the chat or by the corresponding user for private chats
 * @property bool|null $can_send_paid_media Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is available only for channel chats.
 * @property int|null $slow_mode_delay Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds
 * @property int|null $unrestrict_boost_count Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to ignore slow mode and chat permissions
 * @property int|null $message_auto_delete_time Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds
 * @property bool|null $has_aggressive_anti_spam_enabled Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators.
 * @property bool|null $has_hidden_members Optional. True, if non-administrators can only get the list of bots and administrators in the chat
 * @property bool|null $has_protected_content Optional. True, if messages from the chat can't be forwarded to other chats
 * @property bool|null $has_visible_history Optional. True, if new chat members will have access to old messages; available only to chat administrators
 * @property string|null $sticker_set_name Optional. For supergroups, name of the group sticker set
 * @property bool|null $can_set_sticker_set Optional. True, if the bot can change the group sticker set
 * @property string|null $custom_emoji_sticker_set_name Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by all users and bots in the group.
 * @property int|null $linked_chat_id Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @property ChatLocation|null $location Optional. For supergroups, the location to which the supergroup is connected
 * @property UserRating|null $rating Optional. For private chats, the rating of the user if any
 * @property UniqueGiftColors|null $unique_gift_colors Optional. The color scheme based on a unique gift that must be used for the chat's name, message replies and link previews
 * @property int|null $paid_message_star_count Optional. The number of Telegram Stars a general user have to pay to send a message to the chat
 *
 * @method int id()
 * @method string type()
 * @method string|null title()
 * @method string|null username()
 * @method string|null firstName()
 * @method string|null lastName()
 * @method bool|null isForum()
 * @method bool|null isDirectMessages()
 * @method int accentColorId()
 * @method int maxReactionCount()
 * @method ChatPhoto|null photo()
 * @method string[]|null activeUsernames()
 * @method Birthdate|null birthdate()
 * @method BusinessIntro|null businessIntro()
 * @method BusinessLocation|null businessLocation()
 * @method BusinessOpeningHours|null businessOpeningHours()
 * @method Chat|null personalChat()
 * @method Chat|null parentChat()
 * @method ReactionType[]|null availableReactions()
 * @method string|null backgroundCustomEmojiId()
 * @method int|null profileAccentColorId()
 * @method string|null profileBackgroundCustomEmojiId()
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
 * @method AcceptedGiftTypes acceptedGiftTypes()
 * @method bool|null canSendPaidMedia()
 * @method int|null slowModeDelay()
 * @method int|null unrestrictBoostCount()
 * @method int|null messageAutoDeleteTime()
 * @method bool|null hasAggressiveAntiSpamEnabled()
 * @method bool|null hasHiddenMembers()
 * @method bool|null hasProtectedContent()
 * @method bool|null hasVisibleHistory()
 * @method string|null stickerSetName()
 * @method bool|null canSetStickerSet()
 * @method string|null customEmojiStickerSetName()
 * @method int|null linkedChatId()
 * @method ChatLocation|null location()
 * @method UserRating|null rating()
 * @method UniqueGiftColors|null uniqueGiftColors()
 * @method int|null paidMessageStarCount()
 *
 * @method static setId(int $id)
 * @method static setType(string $type)
 * @method static setTitle(string|null $title)
 * @method static setUsername(string|null $username)
 * @method static setFirstName(string|null $firstName)
 * @method static setLastName(string|null $lastName)
 * @method static setIsForum(bool|null $isForum)
 * @method static setIsDirectMessages(bool|null $isDirectMessages)
 * @method static setAccentColorId(int $accentColorId)
 * @method static setMaxReactionCount(int $maxReactionCount)
 * @method static setPhoto(ChatPhoto|null $photo)
 * @method static setActiveUsernames(string[]|null $activeUsernames)
 * @method static setBirthdate(Birthdate|null $birthdate)
 * @method static setBusinessIntro(BusinessIntro|null $businessIntro)
 * @method static setBusinessLocation(BusinessLocation|null $businessLocation)
 * @method static setBusinessOpeningHours(BusinessOpeningHours|null $businessOpeningHours)
 * @method static setPersonalChat(Chat|null $personalChat)
 * @method static setParentChat(Chat|null $parentChat)
 * @method static setAvailableReactions(ReactionType[]|null $availableReactions)
 * @method static setBackgroundCustomEmojiId(string|null $backgroundCustomEmojiId)
 * @method static setProfileAccentColorId(int|null $profileAccentColorId)
 * @method static setProfileBackgroundCustomEmojiId(string|null $profileBackgroundCustomEmojiId)
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
 * @method static setAcceptedGiftTypes(AcceptedGiftTypes $acceptedGiftTypes)
 * @method static setCanSendPaidMedia(bool|null $canSendPaidMedia)
 * @method static setSlowModeDelay(int|null $slowModeDelay)
 * @method static setUnrestrictBoostCount(int|null $unrestrictBoostCount)
 * @method static setMessageAutoDeleteTime(int|null $messageAutoDeleteTime)
 * @method static setHasAggressiveAntiSpamEnabled(bool|null $hasAggressiveAntiSpamEnabled)
 * @method static setHasHiddenMembers(bool|null $hasHiddenMembers)
 * @method static setHasProtectedContent(bool|null $hasProtectedContent)
 * @method static setHasVisibleHistory(bool|null $hasVisibleHistory)
 * @method static setStickerSetName(string|null $stickerSetName)
 * @method static setCanSetStickerSet(bool|null $canSetStickerSet)
 * @method static setCustomEmojiStickerSetName(string|null $customEmojiStickerSetName)
 * @method static setLinkedChatId(int|null $linkedChatId)
 * @method static setLocation(ChatLocation|null $location)
 * @method static setRating(UserRating|null $rating)
 * @method static setUniqueGiftColors(UniqueGiftColors|null $uniqueGiftColors)
 * @method static setPaidMessageStarCount(int|null $paidMessageStarCount)
 *
 * @see https://core.telegram.org/bots/api#chatfullinfo
 */
class ChatFullInfo extends abstractType
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
            'is_direct_messages'                      => FieldType::optional('boolean'),
            'accent_color_id'                         => FieldType::single('integer'),
            'max_reaction_count'                      => FieldType::single('integer'),
            'photo'                                   => FieldType::optional(ChatPhoto::class),
            'active_usernames'                        => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
            'birthdate'                               => FieldType::optional(Birthdate::class),
            'business_intro'                          => FieldType::optional(BusinessIntro::class),
            'business_location'                       => FieldType::optional(BusinessLocation::class),
            'business_opening_hours'                  => FieldType::optional(BusinessOpeningHours::class),
            'personal_chat'                           => FieldType::optional(Chat::class),
            'parent_chat'                             => FieldType::optional(Chat::class),
            'available_reactions'                     => new FieldType(ReactionType::class, allowArrays: true, allowNull: true, subTypes: []),
            'background_custom_emoji_id'              => FieldType::optional('string'),
            'profile_accent_color_id'                 => FieldType::optional('integer'),
            'profile_background_custom_emoji_id'      => FieldType::optional('string'),
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
            'accepted_gift_types'                     => FieldType::single(AcceptedGiftTypes::class),
            'can_send_paid_media'                     => FieldType::optional('boolean'),
            'slow_mode_delay'                         => FieldType::optional('integer'),
            'unrestrict_boost_count'                  => FieldType::optional('integer'),
            'message_auto_delete_time'                => FieldType::optional('integer'),
            'has_aggressive_anti_spam_enabled'        => FieldType::optional('boolean'),
            'has_hidden_members'                      => FieldType::optional('boolean'),
            'has_protected_content'                   => FieldType::optional('boolean'),
            'has_visible_history'                     => FieldType::optional('boolean'),
            'sticker_set_name'                        => FieldType::optional('string'),
            'can_set_sticker_set'                     => FieldType::optional('boolean'),
            'custom_emoji_sticker_set_name'           => FieldType::optional('string'),
            'linked_chat_id'                          => FieldType::optional('integer'),
            'location'                                => FieldType::optional(ChatLocation::class),
            'rating'                                  => FieldType::optional(UserRating::class),
            'unique_gift_colors'                      => FieldType::optional(UniqueGiftColors::class),
            'paid_message_star_count'                 => FieldType::optional('integer'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
