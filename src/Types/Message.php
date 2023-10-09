<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a message.
 *
 * @property int $message_id Unique message identifier inside this chat
 * @property int|null $message_thread_id Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
 * @property User|null $from Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
 * @property Chat|null $sender_chat Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
 * @property int $date Date the message was sent in Unix time
 * @property Chat $chat Conversation the message belongs to
 * @property User|null $forward_from Optional. For forwarded messages, sender of the original message
 * @property Chat|null $forward_from_chat Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
 * @property int|null $forward_from_message_id Optional. For messages forwarded from channels, identifier of the original message in the channel
 * @property string|null $forward_signature Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present
 * @property string|null $forward_sender_name Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
 * @property int|null $forward_date Optional. For forwarded messages, date the original message was sent in Unix time
 * @property bool|null $is_topic_message Optional. True, if the message is sent to a forum topic
 * @property bool|null $is_automatic_forward Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
 * @property Message|null $reply_to_message Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @property User|null $via_bot Optional. Bot through which the message was sent
 * @property int|null $edit_date Optional. Date the message was last edited in Unix time
 * @property bool|null $has_protected_content Optional. True, if the message can't be forwarded
 * @property string|null $media_group_id Optional. The unique identifier of a media message group this message belongs to
 * @property string|null $author_signature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
 * @property string|null $text Optional. For text messages, the actual UTF-8 text of the message
 * @property MessageEntity[]|null $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
 * @property Animation|null $animation Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
 * @property Audio|null $audio Optional. Message is an audio file, information about the file
 * @property Document|null $document Optional. Message is a general file, information about the file
 * @property PhotoSize[]|null $photo Optional. Message is a photo, available sizes of the photo
 * @property Sticker|null $sticker Optional. Message is a sticker, information about the sticker
 * @property Story|null $story Optional. Message is a forwarded story
 * @property Video|null $video Optional. Message is a video, information about the video
 * @property VideoNote|null $video_note Optional. Message is a video note, information about the video message
 * @property Voice|null $voice Optional. Message is a voice message, information about the file
 * @property string|null $caption Optional. Caption for the animation, audio, document, photo, video or voice
 * @property MessageEntity[]|null $caption_entities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
 * @property bool|null $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
 * @property Contact|null $contact Optional. Message is a shared contact, information about the contact
 * @property Dice|null $dice Optional. Message is a dice with random value
 * @property Game|null $game Optional. Message is a game, information about the game. More about games: https://core.telegram.org/bots/api#games
 * @property Poll|null $poll Optional. Message is a native poll, information about the poll
 * @property Venue|null $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
 * @property Location|null $location Optional. Message is a shared location, information about the location
 * @property User[]|null $new_chat_members Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
 * @property User|null $left_chat_member Optional. A member was removed from the group, information about them (this member may be the bot itself)
 * @property string|null $new_chat_title Optional. A chat title was changed to this value
 * @property PhotoSize[]|null $new_chat_photo Optional. A chat photo was change to this value
 * @property bool|null $delete_chat_photo Optional. Service message: the chat photo was deleted
 * @property bool|null $group_chat_created Optional. Service message: the group has been created
 * @property bool|null $supergroup_chat_created Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @property bool|null $channel_chat_created Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @property MessageAutoDeleteTimerChanged|null $message_auto_delete_timer_changed Optional. Service message: auto-delete timer settings changed in the chat
 * @property int|null $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property int|null $migrate_from_chat_id Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property Message|null $pinned_message Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
 * @property Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments: https://core.telegram.org/bots/api#payments
 * @property SuccessfulPayment|null $successful_payment Optional. Message is a service message about a successful payment, information about the payment. More about payments: https://core.telegram.org/bots/api#payments
 * @property UserShared|null $user_shared Optional. Service message: a user was shared with the bot
 * @property ChatShared|null $chat_shared Optional. Service message: a chat was shared with the bot
 * @property string|null $connected_website Optional. The domain name of the website on which the user has logged in. More about Telegram Login: https://core.telegram.org/widgets/login
 * @property WriteAccessAllowed|null $write_access_allowed Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
 * @property PassportData|null $passport_data Optional. Telegram Passport data
 * @property ProximityAlertTriggered|null $proximity_alert_triggered Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
 * @property ForumTopicCreated|null $forum_topic_created Optional. Service message: forum topic created
 * @property ForumTopicEdited|null $forum_topic_edited Optional. Service message: forum topic edited
 * @property ForumTopicClosed|null $forum_topic_closed Optional. Service message: forum topic closed
 * @property ForumTopicReopened|null $forum_topic_reopened Optional. Service message: forum topic reopened
 * @property GeneralForumTopicHidden|null $general_forum_topic_hidden Optional. Service message: the 'General' forum topic hidden
 * @property GeneralForumTopicUnhidden|null $general_forum_topic_unhidden Optional. Service message: the 'General' forum topic unhidden
 * @property VideoChatScheduled|null $video_chat_scheduled Optional. Service message: video chat scheduled
 * @property VideoChatStarted|null $video_chat_started Optional. Service message: video chat started
 * @property VideoChatEnded|null $video_chat_ended Optional. Service message: video chat ended
 * @property VideoChatParticipantsInvited|null $video_chat_participants_invited Optional. Service message: new participants invited to a video chat
 * @property WebAppData|null $web_app_data Optional. Service message: data sent by a Web App
 * @property InlineKeyboardMarkup|null $reply_markup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 *
 * @method int messageId()
 * @method int|null messageThreadId()
 * @method User|null from()
 * @method Chat|null senderChat()
 * @method int date()
 * @method Chat chat()
 * @method User|null forwardFrom()
 * @method Chat|null forwardFromChat()
 * @method int|null forwardFromMessageId()
 * @method string|null forwardSignature()
 * @method string|null forwardSenderName()
 * @method int|null forwardDate()
 * @method bool|null isTopicMessage()
 * @method bool|null isAutomaticForward()
 * @method Message|null replyToMessage()
 * @method User|null viaBot()
 * @method int|null editDate()
 * @method bool|null hasProtectedContent()
 * @method string|null mediaGroupId()
 * @method string|null authorSignature()
 * @method string|null text()
 * @method MessageEntity[]|null entities()
 * @method Animation|null animation()
 * @method Audio|null audio()
 * @method Document|null document()
 * @method PhotoSize[]|null photo()
 * @method Sticker|null sticker()
 * @method Story|null story()
 * @method Video|null video()
 * @method VideoNote|null videoNote()
 * @method Voice|null voice()
 * @method string|null caption()
 * @method MessageEntity[]|null captionEntities()
 * @method bool|null hasMediaSpoiler()
 * @method Contact|null contact()
 * @method Dice|null dice()
 * @method Game|null game()
 * @method Poll|null poll()
 * @method Venue|null venue()
 * @method Location|null location()
 * @method User[]|null newChatMembers()
 * @method User|null leftChatMember()
 * @method string|null newChatTitle()
 * @method PhotoSize[]|null newChatPhoto()
 * @method bool|null deleteChatPhoto()
 * @method bool|null groupChatCreated()
 * @method bool|null supergroupChatCreated()
 * @method bool|null channelChatCreated()
 * @method MessageAutoDeleteTimerChanged|null messageAutoDeleteTimerChanged()
 * @method int|null migrateToChatId()
 * @method int|null migrateFromChatId()
 * @method Message|null pinnedMessage()
 * @method Invoice|null invoice()
 * @method SuccessfulPayment|null successfulPayment()
 * @method UserShared|null userShared()
 * @method ChatShared|null chatShared()
 * @method string|null connectedWebsite()
 * @method WriteAccessAllowed|null writeAccessAllowed()
 * @method PassportData|null passportData()
 * @method ProximityAlertTriggered|null proximityAlertTriggered()
 * @method ForumTopicCreated|null forumTopicCreated()
 * @method ForumTopicEdited|null forumTopicEdited()
 * @method ForumTopicClosed|null forumTopicClosed()
 * @method ForumTopicReopened|null forumTopicReopened()
 * @method GeneralForumTopicHidden|null generalForumTopicHidden()
 * @method GeneralForumTopicUnhidden|null generalForumTopicUnhidden()
 * @method VideoChatScheduled|null videoChatScheduled()
 * @method VideoChatStarted|null videoChatStarted()
 * @method VideoChatEnded|null videoChatEnded()
 * @method VideoChatParticipantsInvited|null videoChatParticipantsInvited()
 * @method WebAppData|null webAppData()
 * @method InlineKeyboardMarkup|null replyMarkup()
 *
 * @method static setMessageId(int $messageId)
 * @method static setMessageThreadId(int|null $messageThreadId)
 * @method static setFrom(User|null $from)
 * @method static setSenderChat(Chat|null $senderChat)
 * @method static setDate(int $date)
 * @method static setChat(Chat $chat)
 * @method static setForwardFrom(User|null $forwardFrom)
 * @method static setForwardFromChat(Chat|null $forwardFromChat)
 * @method static setForwardFromMessageId(int|null $forwardFromMessageId)
 * @method static setForwardSignature(string|null $forwardSignature)
 * @method static setForwardSenderName(string|null $forwardSenderName)
 * @method static setForwardDate(int|null $forwardDate)
 * @method static setIsTopicMessage(bool|null $isTopicMessage)
 * @method static setIsAutomaticForward(bool|null $isAutomaticForward)
 * @method static setReplyToMessage(Message|null $replyToMessage)
 * @method static setViaBot(User|null $viaBot)
 * @method static setEditDate(int|null $editDate)
 * @method static setHasProtectedContent(bool|null $hasProtectedContent)
 * @method static setMediaGroupId(string|null $mediaGroupId)
 * @method static setAuthorSignature(string|null $authorSignature)
 * @method static setText(string|null $text)
 * @method static setEntities(MessageEntity[]|null $entities)
 * @method static setAnimation(Animation|null $animation)
 * @method static setAudio(Audio|null $audio)
 * @method static setDocument(Document|null $document)
 * @method static setPhoto(PhotoSize[]|null $photo)
 * @method static setSticker(Sticker|null $sticker)
 * @method static setStory(Story|null $story)
 * @method static setVideo(Video|null $video)
 * @method static setVideoNote(VideoNote|null $videoNote)
 * @method static setVoice(Voice|null $voice)
 * @method static setCaption(string|null $caption)
 * @method static setCaptionEntities(MessageEntity[]|null $captionEntities)
 * @method static setHasMediaSpoiler(bool|null $hasMediaSpoiler)
 * @method static setContact(Contact|null $contact)
 * @method static setDice(Dice|null $dice)
 * @method static setGame(Game|null $game)
 * @method static setPoll(Poll|null $poll)
 * @method static setVenue(Venue|null $venue)
 * @method static setLocation(Location|null $location)
 * @method static setNewChatMembers(User[]|null $newChatMembers)
 * @method static setLeftChatMember(User|null $leftChatMember)
 * @method static setNewChatTitle(string|null $newChatTitle)
 * @method static setNewChatPhoto(PhotoSize[]|null $newChatPhoto)
 * @method static setDeleteChatPhoto(bool|null $deleteChatPhoto)
 * @method static setGroupChatCreated(bool|null $groupChatCreated)
 * @method static setSupergroupChatCreated(bool|null $supergroupChatCreated)
 * @method static setChannelChatCreated(bool|null $channelChatCreated)
 * @method static setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged|null $messageAutoDeleteTimerChanged)
 * @method static setMigrateToChatId(int|null $migrateToChatId)
 * @method static setMigrateFromChatId(int|null $migrateFromChatId)
 * @method static setPinnedMessage(Message|null $pinnedMessage)
 * @method static setInvoice(Invoice|null $invoice)
 * @method static setSuccessfulPayment(SuccessfulPayment|null $successfulPayment)
 * @method static setUserShared(UserShared|null $userShared)
 * @method static setChatShared(ChatShared|null $chatShared)
 * @method static setConnectedWebsite(string|null $connectedWebsite)
 * @method static setWriteAccessAllowed(WriteAccessAllowed|null $writeAccessAllowed)
 * @method static setPassportData(PassportData|null $passportData)
 * @method static setProximityAlertTriggered(ProximityAlertTriggered|null $proximityAlertTriggered)
 * @method static setForumTopicCreated(ForumTopicCreated|null $forumTopicCreated)
 * @method static setForumTopicEdited(ForumTopicEdited|null $forumTopicEdited)
 * @method static setForumTopicClosed(ForumTopicClosed|null $forumTopicClosed)
 * @method static setForumTopicReopened(ForumTopicReopened|null $forumTopicReopened)
 * @method static setGeneralForumTopicHidden(GeneralForumTopicHidden|null $generalForumTopicHidden)
 * @method static setGeneralForumTopicUnhidden(GeneralForumTopicUnhidden|null $generalForumTopicUnhidden)
 * @method static setVideoChatScheduled(VideoChatScheduled|null $videoChatScheduled)
 * @method static setVideoChatStarted(VideoChatStarted|null $videoChatStarted)
 * @method static setVideoChatEnded(VideoChatEnded|null $videoChatEnded)
 * @method static setVideoChatParticipantsInvited(VideoChatParticipantsInvited|null $videoChatParticipantsInvited)
 * @method static setWebAppData(WebAppData|null $webAppData)
 * @method static setReplyMarkup(InlineKeyboardMarkup|null $replyMarkup)
 *
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'message_id'                        => FieldType::single('integer'),
            'message_thread_id'                 => FieldType::optional('integer'),
            'from'                              => FieldType::optional(User::class),
            'sender_chat'                       => FieldType::optional(Chat::class),
            'date'                              => FieldType::single('integer'),
            'chat'                              => FieldType::single(Chat::class),
            'forward_from'                      => FieldType::optional(User::class),
            'forward_from_chat'                 => FieldType::optional(Chat::class),
            'forward_from_message_id'           => FieldType::optional('integer'),
            'forward_signature'                 => FieldType::optional('string'),
            'forward_sender_name'               => FieldType::optional('string'),
            'forward_date'                      => FieldType::optional('integer'),
            'is_topic_message'                  => FieldType::optional('boolean'),
            'is_automatic_forward'              => FieldType::optional('boolean'),
            'reply_to_message'                  => FieldType::optional(Message::class),
            'via_bot'                           => FieldType::optional(User::class),
            'edit_date'                         => FieldType::optional('integer'),
            'has_protected_content'             => FieldType::optional('boolean'),
            'media_group_id'                    => FieldType::optional('string'),
            'author_signature'                  => FieldType::optional('string'),
            'text'                              => FieldType::optional('string'),
            'entities'                          => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'animation'                         => FieldType::optional(Animation::class),
            'audio'                             => FieldType::optional(Audio::class),
            'document'                          => FieldType::optional(Document::class),
            'photo'                             => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'sticker'                           => FieldType::optional(Sticker::class),
            'story'                             => FieldType::optional(Story::class),
            'video'                             => FieldType::optional(Video::class),
            'video_note'                        => FieldType::optional(VideoNote::class),
            'voice'                             => FieldType::optional(Voice::class),
            'caption'                           => FieldType::optional('string'),
            'caption_entities'                  => new FieldType(MessageEntity::class, allowArrays: true, allowNull: true, subTypes: []),
            'has_media_spoiler'                 => FieldType::optional('boolean'),
            'contact'                           => FieldType::optional(Contact::class),
            'dice'                              => FieldType::optional(Dice::class),
            'game'                              => FieldType::optional(Game::class),
            'poll'                              => FieldType::optional(Poll::class),
            'venue'                             => FieldType::optional(Venue::class),
            'location'                          => FieldType::optional(Location::class),
            'new_chat_members'                  => new FieldType(User::class, allowArrays: true, allowNull: true, subTypes: []),
            'left_chat_member'                  => FieldType::optional(User::class),
            'new_chat_title'                    => FieldType::optional('string'),
            'new_chat_photo'                    => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'delete_chat_photo'                 => FieldType::optional('boolean'),
            'group_chat_created'                => FieldType::optional('boolean'),
            'supergroup_chat_created'           => FieldType::optional('boolean'),
            'channel_chat_created'              => FieldType::optional('boolean'),
            'message_auto_delete_timer_changed' => FieldType::optional(MessageAutoDeleteTimerChanged::class),
            'migrate_to_chat_id'                => FieldType::optional('integer'),
            'migrate_from_chat_id'              => FieldType::optional('integer'),
            'pinned_message'                    => FieldType::optional(Message::class),
            'invoice'                           => FieldType::optional(Invoice::class),
            'successful_payment'                => FieldType::optional(SuccessfulPayment::class),
            'user_shared'                       => FieldType::optional(UserShared::class),
            'chat_shared'                       => FieldType::optional(ChatShared::class),
            'connected_website'                 => FieldType::optional('string'),
            'write_access_allowed'              => FieldType::optional(WriteAccessAllowed::class),
            'passport_data'                     => FieldType::optional(PassportData::class),
            'proximity_alert_triggered'         => FieldType::optional(ProximityAlertTriggered::class),
            'forum_topic_created'               => FieldType::optional(ForumTopicCreated::class),
            'forum_topic_edited'                => FieldType::optional(ForumTopicEdited::class),
            'forum_topic_closed'                => FieldType::optional(ForumTopicClosed::class),
            'forum_topic_reopened'              => FieldType::optional(ForumTopicReopened::class),
            'general_forum_topic_hidden'        => FieldType::optional(GeneralForumTopicHidden::class),
            'general_forum_topic_unhidden'      => FieldType::optional(GeneralForumTopicUnhidden::class),
            'video_chat_scheduled'              => FieldType::optional(VideoChatScheduled::class),
            'video_chat_started'                => FieldType::optional(VideoChatStarted::class),
            'video_chat_ended'                  => FieldType::optional(VideoChatEnded::class),
            'video_chat_participants_invited'   => FieldType::optional(VideoChatParticipantsInvited::class),
            'web_app_data'                      => FieldType::optional(WebAppData::class),
            'reply_markup'                      => FieldType::optional(InlineKeyboardMarkup::class),
            // Legacy params 
            'new_chat_participant'              => FieldType::optional(User::class),
        ];
    }
}
