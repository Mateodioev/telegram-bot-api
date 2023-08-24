<?php declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a message.
 *
 * @property int $message_id Unique message identifier inside this chat
 * @property ?int $message_thread_id Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
 * @property ?User $from Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
 * @property ?Chat $sender_chat Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
 * @property int $date Date the message was sent in Unix time
 * @property Chat $chat Conversation the message belongs to
 * @property ?User $forward_from Optional. For forwarded messages, sender of the original message
 * @property ?Chat $forward_from_chat Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
 * @property ?int $forward_from_message_id Optional. For messages forwarded from channels, identifier of the original message in the channel
 * @property ?string $forward_signature Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present
 * @property ?string $forward_sender_name Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
 * @property ?int $forward_date Optional. For forwarded messages, date the original message was sent in Unix time
 * @property ?bool $is_topic_message Optional. True, if the message is sent to a forum topic
 * @property ?bool $is_automatic_forward Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
 * @property ?Message $reply_to_message Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
 * @property ?User $via_bot Optional. Bot through which the message was sent
 * @property ?int $edit_date Optional. Date the message was last edited in Unix time
 * @property ?bool $has_protected_content Optional. True, if the message can't be forwarded
 * @property ?string $media_group_id Optional. The unique identifier of a media message group this message belongs to
 * @property ?string $author_signature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
 * @property ?string $text Optional. For text messages, the actual UTF-8 text of the message
 * @property ?MessageEntity[] $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
 * @property ?Animation $animation Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
 * @property ?Audio $audio Optional. Message is an audio file, information about the file
 * @property ?Document $document Optional. Message is a general file, information about the file
 * @property ?PhotoSize[] $photo Optional. Message is a photo, available sizes of the photo
 * @property ?Sticker $sticker Optional. Message is a sticker, information about the sticker
 * @property ?Story $story Optional. Message is a forwarded story
 * @property ?Video $video Optional. Message is a video, information about the video
 * @property ?VideoNote $video_note Optional. Message is a video note, information about the video message
 * @property ?Voice $voice Optional. Message is a voice message, information about the file
 * @property ?string $caption Optional. Caption for the animation, audio, document, photo, video or voice
 * @property ?MessageEntity[] $caption_entities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
 * @property ?bool $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
 * @property ?Contact $contact Optional. Message is a shared contact, information about the contact
 * @property ?Dice $dice Optional. Message is a dice with random value
 * @property ?Game $game Optional. Message is a game, information about the game. More about games: https://core.telegram.org/bots/api#games
 * @property ?Poll $poll Optional. Message is a native poll, information about the poll
 * @property ?Venue $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
 * @property ?Location $location Optional. Message is a shared location, information about the location
 * @property ?User[] $new_chat_members Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
 * @property ?User $left_chat_member Optional. A member was removed from the group, information about them (this member may be the bot itself)
 * @property ?string $new_chat_title Optional. A chat title was changed to this value
 * @property ?PhotoSize[] $new_chat_photo Optional. A chat photo was change to this value
 * @property ?bool $delete_chat_photo Optional. Service message: the chat photo was deleted
 * @property ?bool $group_chat_created Optional. Service message: the group has been created
 * @property ?bool $supergroup_chat_created Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @property ?bool $channel_chat_created Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @property ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed Optional. Service message: auto-delete timer settings changed in the chat
 * @property ?int $migrate_to_chat_id Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property ?int $migrate_from_chat_id Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property ?Message $pinned_message Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
 * @property ?Invoice $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments: https://core.telegram.org/bots/api#payments
 * @property ?SuccessfulPayment $successful_payment Optional. Message is a service message about a successful payment, information about the payment. More about payments: https://core.telegram.org/bots/api#payments
 * @property ?UserShared $user_shared Optional. Service message: a user was shared with the bot
 * @property ?ChatShared $chat_shared Optional. Service message: a chat was shared with the bot
 * @property ?string $connected_website Optional. The domain name of the website on which the user has logged in. More about Telegram Login: https://core.telegram.org/widgets/login
 * @property ?WriteAccessAllowed $write_access_allowed Optional. Service message: the user allowed the bot added to the attachment menu to write messages
 * @property ?PassportData $passport_data Optional. Telegram Passport data
 * @property ?ProximityAlertTriggered $proximity_alert_triggered Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
 * @property ?ForumTopicCreated $forum_topic_created Optional. Service message: forum topic created
 * @property ?ForumTopicEdited $forum_topic_edited Optional. Service message: forum topic edited
 * @property ?ForumTopicClosed $forum_topic_closed Optional. Service message: forum topic closed
 * @property ?ForumTopicReopened $forum_topic_reopened Optional. Service message: forum topic reopened
 * @property ?GeneralForumTopicHidden $general_forum_topic_hidden Optional. Service message: the 'General' forum topic hidden
 * @property ?GeneralForumTopicUnhidden $general_forum_topic_unhidden Optional. Service message: the 'General' forum topic unhidden
 * @property ?VideoChatScheduled $video_chat_scheduled Optional. Service message: video chat scheduled
 * @property ?VideoChatStarted $video_chat_started Optional. Service message: video chat started
 * @property ?VideoChatEnded $video_chat_ended Optional. Service message: video chat ended
 * @property ?VideoChatParticipantsInvited $video_chat_participants_invited Optional. Service message: new participants invited to a video chat
 * @property ?WebAppData $web_app_data Optional. Service message: data sent by a Web App
 * @property ?InlineKeyboardMarkup $reply_markup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 *
 * @method int messageId()
 * @method ?int messageThreadId()
 * @method ?User from()
 * @method ?Chat senderChat()
 * @method int date()
 * @method Chat chat()
 * @method ?User forwardFrom()
 * @method ?Chat forwardFromChat()
 * @method ?int forwardFromMessageId()
 * @method ?string forwardSignature()
 * @method ?string forwardSenderName()
 * @method ?int forwardDate()
 * @method ?bool isTopicMessage()
 * @method ?bool isAutomaticForward()
 * @method ?Message replyToMessage()
 * @method ?User viaBot()
 * @method ?int editDate()
 * @method ?bool hasProtectedContent()
 * @method ?string mediaGroupId()
 * @method ?string authorSignature()
 * @method ?string text()
 * @method ?MessageEntity[] entities()
 * @method ?Animation animation()
 * @method ?Audio audio()
 * @method ?Document document()
 * @method ?PhotoSize[] photo()
 * @method ?Sticker sticker()
 * @method ?Story story()
 * @method ?Video video()
 * @method ?VideoNote videoNote()
 * @method ?Voice voice()
 * @method ?string caption()
 * @method ?MessageEntity[] captionEntities()
 * @method ?bool hasMediaSpoiler()
 * @method ?Contact contact()
 * @method ?Dice dice()
 * @method ?Game game()
 * @method ?Poll poll()
 * @method ?Venue venue()
 * @method ?Location location()
 * @method ?User[] newChatMembers()
 * @method ?User leftChatMember()
 * @method ?string newChatTitle()
 * @method ?PhotoSize[] newChatPhoto()
 * @method ?bool deleteChatPhoto()
 * @method ?bool groupChatCreated()
 * @method ?bool supergroupChatCreated()
 * @method ?bool channelChatCreated()
 * @method ?MessageAutoDeleteTimerChanged messageAutoDeleteTimerChanged()
 * @method ?int migrateToChatId()
 * @method ?int migrateFromChatId()
 * @method ?Message pinnedMessage()
 * @method ?Invoice invoice()
 * @method ?SuccessfulPayment successfulPayment()
 * @method ?UserShared userShared()
 * @method ?ChatShared chatShared()
 * @method ?string connectedWebsite()
 * @method ?WriteAccessAllowed writeAccessAllowed()
 * @method ?PassportData passportData()
 * @method ?ProximityAlertTriggered proximityAlertTriggered()
 * @method ?ForumTopicCreated forumTopicCreated()
 * @method ?ForumTopicEdited forumTopicEdited()
 * @method ?ForumTopicClosed forumTopicClosed()
 * @method ?ForumTopicReopened forumTopicReopened()
 * @method ?GeneralForumTopicHidden generalForumTopicHidden()
 * @method ?GeneralForumTopicUnhidden generalForumTopicUnhidden()
 * @method ?VideoChatScheduled videoChatScheduled()
 * @method ?VideoChatStarted videoChatStarted()
 * @method ?VideoChatEnded videoChatEnded()
 * @method ?VideoChatParticipantsInvited videoChatParticipantsInvited()
 * @method ?WebAppData webAppData()
 * @method ?InlineKeyboardMarkup replyMarkup()
 *
 * @method static setMessageId(int $messageId)
 * @method static setMessageThreadId(?int $messageThreadId)
 * @method static setFrom(?User $from)
 * @method static setSenderChat(?Chat $senderChat)
 * @method static setDate(int $date)
 * @method static setChat(Chat $chat)
 * @method static setForwardFrom(?User $forwardFrom)
 * @method static setForwardFromChat(?Chat $forwardFromChat)
 * @method static setForwardFromMessageId(?int $forwardFromMessageId)
 * @method static setForwardSignature(?string $forwardSignature)
 * @method static setForwardSenderName(?string $forwardSenderName)
 * @method static setForwardDate(?int $forwardDate)
 * @method static setIsTopicMessage(?bool $isTopicMessage)
 * @method static setIsAutomaticForward(?bool $isAutomaticForward)
 * @method static setReplyToMessage(?Message $replyToMessage)
 * @method static setViaBot(?User $viaBot)
 * @method static setEditDate(?int $editDate)
 * @method static setHasProtectedContent(?bool $hasProtectedContent)
 * @method static setMediaGroupId(?string $mediaGroupId)
 * @method static setAuthorSignature(?string $authorSignature)
 * @method static setText(?string $text)
 * @method static setEntities(?MessageEntity[] $entities)
 * @method static setAnimation(?Animation $animation)
 * @method static setAudio(?Audio $audio)
 * @method static setDocument(?Document $document)
 * @method static setPhoto(?PhotoSize[] $photo)
 * @method static setSticker(?Sticker $sticker)
 * @method static setStory(?Story $story)
 * @method static setVideo(?Video $video)
 * @method static setVideoNote(?VideoNote $videoNote)
 * @method static setVoice(?Voice $voice)
 * @method static setCaption(?string $caption)
 * @method static setCaptionEntities(?MessageEntity[] $captionEntities)
 * @method static setHasMediaSpoiler(?bool $hasMediaSpoiler)
 * @method static setContact(?Contact $contact)
 * @method static setDice(?Dice $dice)
 * @method static setGame(?Game $game)
 * @method static setPoll(?Poll $poll)
 * @method static setVenue(?Venue $venue)
 * @method static setLocation(?Location $location)
 * @method static setNewChatMembers(?User[] $newChatMembers)
 * @method static setLeftChatMember(?User $leftChatMember)
 * @method static setNewChatTitle(?string $newChatTitle)
 * @method static setNewChatPhoto(?PhotoSize[] $newChatPhoto)
 * @method static setDeleteChatPhoto(?bool $deleteChatPhoto)
 * @method static setGroupChatCreated(?bool $groupChatCreated)
 * @method static setSupergroupChatCreated(?bool $supergroupChatCreated)
 * @method static setChannelChatCreated(?bool $channelChatCreated)
 * @method static setMessageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged)
 * @method static setMigrateToChatId(?int $migrateToChatId)
 * @method static setMigrateFromChatId(?int $migrateFromChatId)
 * @method static setPinnedMessage(?Message $pinnedMessage)
 * @method static setInvoice(?Invoice $invoice)
 * @method static setSuccessfulPayment(?SuccessfulPayment $successfulPayment)
 * @method static setUserShared(?UserShared $userShared)
 * @method static setChatShared(?ChatShared $chatShared)
 * @method static setConnectedWebsite(?string $connectedWebsite)
 * @method static setWriteAccessAllowed(?WriteAccessAllowed $writeAccessAllowed)
 * @method static setPassportData(?PassportData $passportData)
 * @method static setProximityAlertTriggered(?ProximityAlertTriggered $proximityAlertTriggered)
 * @method static setForumTopicCreated(?ForumTopicCreated $forumTopicCreated)
 * @method static setForumTopicEdited(?ForumTopicEdited $forumTopicEdited)
 * @method static setForumTopicClosed(?ForumTopicClosed $forumTopicClosed)
 * @method static setForumTopicReopened(?ForumTopicReopened $forumTopicReopened)
 * @method static setGeneralForumTopicHidden(?GeneralForumTopicHidden $generalForumTopicHidden)
 * @method static setGeneralForumTopicUnhidden(?GeneralForumTopicUnhidden $generalForumTopicUnhidden)
 * @method static setVideoChatScheduled(?VideoChatScheduled $videoChatScheduled)
 * @method static setVideoChatStarted(?VideoChatStarted $videoChatStarted)
 * @method static setVideoChatEnded(?VideoChatEnded $videoChatEnded)
 * @method static setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $videoChatParticipantsInvited)
 * @method static setWebAppData(?WebAppData $webAppData)
 * @method static setReplyMarkup(?InlineKeyboardMarkup $replyMarkup)
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
        ];
    }
}
