<?php 

namespace Mateodioev\Bots\Telegram\Types;

/**
 * This object represents a message.
 * 
 * @property integer                        $message_id
 * @property ?integer                       $messageThreadId
 * @property ?User                          $from
 * @property ?Chat                          $sender_chat
 * @property integer                        $date
 * @property Chat                           $chat
 * @property ?User                          $forward_from
 * @property ?Chat                          $forward_from_chat
 * @property ?integer                       $forward_from_message_id
 * @property ?string                        $forward_signature
 * @property ?string                        $forward_sender_name
 * @property ?integer                       $forward_date
 * @property ?boolean                       $is_automatic_forward
 * @property ?Message                       $reply_to_message
 * @property ?User                          $via_bot
 * @property ?integer                       $edit_date
 * @property ?boolean                       $has_protected_content
 * @property ?string                        $media_group_id
 * @property ?string                        $author_signature
 * @property ?string                        $text
 * @property ?MessageEntity[]               $entities
 * @property ?Animation                     $animation
 * @property ?Audio                         $audio
 * @property ?Document                      $document
 * @property ?PhotoSize[]                   $photo
 * @property ?Sticker                       $sticker
 * @property ?Video                         $video
 * @property ?VideoNote                     $video_note
 * @property ?Voice                         $voice
 * @property ?string                        $caption
 * @property ?MessageEntity[]               $caption_entities
 * @property ?Contact                       $contact
 * @property ?Dice                          $dice
 * @property ?Game                          $game
 * @property ?Poll                          $poll
 * @property ?Venue                         $venue
 * @property ?Location                      $location
 * @property ?User[]                        $new_chat_members
 * @property ?User                          $left_chat_member
 * @property ?string                        $new_chat_title
 * @property ?PhotoSize[]                   $new_chat_photo
 * @property ?boolean                       $delete_chat_photo
 * @property ?boolean                       $group_chat_created
 * @property ?boolean                       $supergroup_chat_created
 * @property ?boolean                       $channel_chat_created
 * @property ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed
 * @property ?integer                       $migrate_to_chat_id
 * @property ?integer                       $migrate_from_chat_id
 * @property ?Message                       $pinned_message
 * @property ?Message                       $invoice
 * @property ?SuccessfulPayment             $successful_payment
 * @property ?string                        $connected_website
 * @property ?PassportData                  $passport_data
 * @property ?ProximityAlertTriggered       $proximity_alert_triggered
 * @property ?ForumTopicCreated             $forum_topic_created
 * @property ?ForumTopicClosed              $forum_topic_closed
 * @property ?ForumTopicReopened            $forum_topic_reopened
 * @property ?VideoChatScheduled            $video_chat_scheduled
 * @property ?VideoChatStarted              $video_chat_started
 * @property ?VideoChatEnded                $video_chat_ended
 * @property ?VideoChatParticipantsInvited  $video_chat_participants_invited
 * @property ?WebAppData                    $web_app_data
 * @property ?InlineKeyboardMarkup          $reply_markup
 * 
 * @method integer                        messageId()
 * @method ?integer                       messageThreadId()
 * @method ?User                          from()
 * @method ?Chat                          senderChat()
 * @method integer                        date()
 * @method Chat                           chat()
 * @method ?User                          forwardFrom()
 * @method ?Chat                          forwardFromChat()
 * @method ?integer                       forwardFromMessageId()
 * @method ?string                        forwardSignature()
 * @method ?string                        forwardSenderName()
 * @method ?integer                       forwardDate()
 * @method ?boolean                       isAutomaticForward()
 * @method ?Message                       replyToMessage()
 * @method ?User                          viaBot()
 * @method ?integer                       editDate()
 * @method ?boolean                       hasProtectedContent()
 * @method ?string                        mediaGroupId()
 * @method ?string                        authorSignature()
 * @method ?string                        text()
 * @method ?MessageEntity[]               entities()
 * @method ?Animation                     animation()
 * @method ?Audio                         audio()
 * @method ?Document                      document()
 * @method ?PhotoSize[]                   photo()
 * @method ?Sticker                       sticker()
 * @method ?Video                         video()
 * @method ?VideoNote                     videoNote()
 * @method ?Voice                         voice()
 * @method ?string                        caption()
 * @method ?MessageEntity[]               captionEntities()
 * @method ?Contact                       contact()
 * @method ?Dice                          dice()
 * @method ?Game                          game()
 * @method ?Poll                          poll()
 * @method ?Venue                         venue()
 * @method ?Location                      location()
 * @method ?User[]                        newChatMembers()
 * @method ?User                          leftChatMember()
 * @method ?string                        newChatTitle()
 * @method ?PhotoSize[]                   newChatPhoto()
 * @method ?boolean                       deleteChatPhoto()
 * @method ?boolean                       groupChatCreated()
 * @method ?boolean                       supergroupChatCreated()
 * @method ?boolean                       channelChatCreated()
 * @method ?MessageAutoDeleteTimerChanged messageAutoDeleteTimerChanged()
 * @method ?integer                       migrateToChatId()
 * @method ?integer                       migrateFromChatId()
 * @method ?Message                       pinnedMessage()
 * @method ?Message                       invoice()
 * @method ?SuccessfulPayment             successfulPayment()
 * @method ?string                        connectedWebsite()
 * @method ?PassportData                  passportData()
 * @method ?ProximityAlertTriggered       proximityAlertTriggered()
 * @method ?ForumTopicCreated             forumTopicCreated()
 * @method ?ForumTopicClosed              forumTopicClosed()
 * @method ?ForumTopicReopened            forumTopicReopened()
 * @method ?VideoChatScheduled            videoChatScheduled()
 * @method ?VideoChatStarted              videoChatStarted()
 * @method ?VideoChatEnded                videoChatEnded()
 * @method ?VideoChatParticipantsInvited  videoChatParticipantsInvited()
 * @method ?WebAppData                    webAppData()
 * @method ?InlineKeyboardMarkup          replyMarkup()
 * 
 * @method static setMessageId(integer $messageId)
 * @method static setMessageThreadId(integer $messageThreadId)
 * @method static setFrom(User $from)
 * @method static setSenderChat(Chat $senderChat)
 * @method static setDate(integer $date)
 * @method static setChat(Chat $chat)
 * @method static setForwardFrom(User $forwardFrom)
 * @method static setForwardFromChat(Chat $forwardFromChat)
 * @method static setForwardFromMessageId(integer $forwardFromMessageId)
 * @method static setForwardSignature(string $forwardSignature)
 * @method static setForwardSenderName(string $forwardSenderName)
 * @method static setForwardDate(integer $forwardDate)
 * @method static setIsAutomaticForward(boolean $isAutomaticForward)
 * @method static setReplyToMessage(Message $replyToMessage)
 * @method static setViaBot(User $viaBot)
 * @method static setEditDate(integer $editDate)
 * @method static setHasProtectedContent(boolean $hasProtectedContent)
 * @method static setMediaGroupId(string $mediaGroupId)
 * @method static setAuthorSignature(string $authorSignature)
 * @method static setText(string $text)
 * @method static setEntities(array $entities)
 * @method static setAnimation(Animation $animation)
 * @method static setAudio(Audio $audio)
 * @method static setDocument(Document $document)
 * @method static setPhoto(array $photo)
 * @method static setSticker(Sticker $sticker)
 * @method static setVideo(Video $video)
 * @method static setVideoNote(VideoNote $videoNote)
 * @method static setVoice(Voice $voice)
 * @method static setCaption(string $caption)
 * @method static setCaptionEntities(array $captionEntities)
 * @method static setContact(Contact $contact)
 * @method static setDice(Dice $dice)
 * @method static setGame(Game $game)
 * @method static setPoll(Poll $poll)
 * @method static setVenue(Venue $venue)
 * @method static setLocation(Location $location)
 * @method static setNewChatMembers(array $newChatMembers)
 * @method static setLeftChatMember(User $leftChatMember)
 * @method static setNewChatTitle(string $newChatTitle)
 * @method static setNewChatPhoto(array $newChatPhoto)
 * @method static setDeleteChatPhoto(boolean $deleteChatPhoto)
 * @method static setGroupChatCreated(boolean $groupChatCreated)
 * @method static setSupergroupChatCreated(boolean $supergroupChatCreated)
 * @method static setChannelChatCreated(boolean $channelChatCreated)
 * @method static setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged)
 * @method static setMigrateToChatId(integer $migrateToChatId)
 * @method static setMigrateFromChatId(integer $migrateFromChatId)
 * @method static setPinnedMessage(Message $pinnedMessage)
 * @method static setInvoice(Message $invoice)
 * @method static setSuccessfulPayment(SuccessfulPayment $successfulPayment)
 * @method static setConnectedWebsite(string $connectedWebsite)
 * @method static setPassportData(PassportData $passportData)
 * @method static setProximityAlertTriggered(ProximityAlertTriggered $proximityAlertTriggered)
 * @method static setForumTopicCreated(ForumTopicCreated $forumTopicCreated)
 * @method static setForumTopicClosed(ForumTopicClosed $forumTopicClosed)
 * @method static setForumTopicReopened(ForumTopicReopened $forumTopicReopened)
 * @method static setVideoChatScheduled(VideoChatScheduled $videoChatScheduled)
 * @method static setVideoChatStarted(VideoChatStarted $videoChatStarted)
 * @method static setVideoChatEnded(VideoChatEnded $videoChatEnded)
 * @method static setVideoChatParticipantsInvited(VideoChatParticipantsInvited $videoChatParticipantsInvited)
 * @method static setWebAppData(WebAppData $webAppData)
 * @method static setReplyMarkup(InlineKeyboardMarkup $replyMarkup)
 * 
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends baseType
{
    protected array $fields = [
        'message_id'                        => 'integer',
        'message_thread_id'                 => 'integer',
        'from'                              => User::class,
        'sender_chat'                       => Chat::class,
        'date'                              => 'integer',
        'chat'                              => Chat::class,
        'forward_from'                      => User::class,
        'forward_from_chat'                 => Chat::class,
        'forward_from_message_id'           => 'integer',
        'forward_signature'                 => 'string',
        'forward_sender_name'               => 'string',
        'forward_date'                      => 'integer',
        'is_automatic_forward'              => 'boolean',
        'reply_to_message'                  => Message::class,
        'via_bot'                           => User::class,
        'edit_date'                         => 'integer',
        'has_protected_content'             => 'boolean',
        'media_group_id'                    => 'string',
        'author_signature'                  => 'string',
        'text'                              => 'string',
        'entities'                          => [MessageEntity::class],
        'animation'                         => Animation::class,
        'audio'                             => Audio::class,
        'document'                          => Document::class,
        'photo'                             => [PhotoSize::class],
        'sticker'                           => Sticker::class,
        'video'                             => Video::class,
        'video_note'                        => VideoNote::class,
        'voice'                             => Voice::class,
        'caption'                           => 'string',
        'caption_entities'                  => [MessageEntity::class],
        'contact'                           => Contact::class,
        'dice'                              => Dice::class,
        'game'                              => Game::class,
        'poll'                              => Poll::class,
        'venue'                             => Venue::class,
        'location'                          => Location::class,
        'new_chat_participant'              => User::class,
        'new_chat_member'                   => User::class,
        'new_chat_members'                  => [User::class],
        'left_chat_member'                  => User::class,
        'new_chat_title'                    => 'string',
        'new_chat_photo'                    => [PhotoSize::class],
        'delete_chat_photo'                 => 'boolean',
        'group_chat_created'                => 'boolean',
        'supergroup_chat_created'           => 'boolean',
        'channel_chat_created'              => 'boolean',
        'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
        'migrate_to_chat_id'                => 'integer',
        'migrate_from_chat_id'              => 'integer',
        'pinned_message'                    => Message::class,
        'invoice'                           => Message::class,
        'successful_payment'                => SuccessfulPayment::class,
        'connected_website'                 => 'string',
        'passport_data'                     => PassportData::class,
        'proximity_alert_triggered'         => ProximityAlertTriggered::class,
        'forum_topic_created'               => ForumTopicCreated::class,
        'forum_topic_closed'                => ForumTopicClosed::class,
        'forum_topic_reopened'              => ForumTopicReopened::class,
        'video_chat_scheduled'              => VideoChatScheduled::class,
        'video_chat_started'                => VideoChatStarted::class,
        'video_chat_ended'                  => VideoChatEnded::class,
        'video_chat_participants_invited'   => VideoChatParticipantsInvited::class,
        'web_app_data'                      => WebAppData::class,
        'reply_markup'                      => InlineKeyboardMarkup::class,
    ];

    public function get()
    {
        return $this->recursiveGet();
    }
}
