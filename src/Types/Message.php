<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * This object represents a message.
 * 
 * @see https://core.telegram.org/bots/api#message
 */
class Message extends TypesBase implements TypesInterface
{
  public int $message_id;
  public ?User $from;
  public ?Chat $sender_chat;
  public int $date;
  public Chat $chat;
  public ?User $forward_from;
  public ?Chat $forward_from_chat;
  public ?int $forward_from_message_id;
  public ?string $forward_signature;
  public ?string $forward_sender_name;
  public ?int $forward_date;
  public ?bool $is_automatic_forward = false;
  public ?Message $reply_to_message;
  public ?User $via_bot;
  public ?int $edit_date;
  public ?bool $has_protected_content = false;
  public ?string $media_group_id;
  public ?string $author_signature;
  public ?string $text;
  public ?array $entities;
  public ?Animation $animation;
  public ?Audio $audio;
  public ?Document $document;
  public ?array $photo;
  public ?Sticker $sticker;
  public ?Video $video;
  public ?VideoNote $video_note;
  public ?Voice $voice;
  public ?string $caption;
  public ?array $caption_entities;
  public ?Contact $contact;
  public ?Dice $dice;
  public ?Game $game;
  public ?Poll $poll;
  public ?Venue $venue;
  public ?Location $location;
  public ?array $new_chat_members;
  public ?User $left_chat_member;
  public ?string $new_chat_title;
  public ?array $new_chat_photo;
  public ?bool $delete_chat_photo;
  public ?bool $group_chat_created;
  public ?bool $supergroup_chat_created;
  public ?bool $channel_chat_created;
  public ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed;
  public ?int $migrate_to_chat_id;
  public ?int $migrate_from_chat_id;
  public ?Message $pinned_message;
  public ?Invoice $invoice;
  public ?SuccessfulPayment $successful_payment;
  public ?string $connected_website;
  public ?PassportData $passport_data;
  public ?ProximityAlertTriggered $proximity_alert_triggered;
  public ?ForumTopicCreated $forum_topic_created;
  public ?ForumTopicClosed $forum_topic_closed;
  public ?ForumTopicReopened $forum_topic_reopened;
  public ?VideoChatScheduled $video_chat_scheduled;
  public ?VideoChatStarted $video_chat_started;
  public ?VideoChatEnded $video_chat_ended;
  public ?VideoChatParticipantsInvited $video_chat_participants_invited;
  public ?WebAppData $web_app_data;
  public ?InlineKeyboardMarkup $reply_markup;

  public function __construct(stdClass $up) {
    $this->setMessageId($up->message_id)
      ->setFrom(User::create($up->from ?? self::DEFAULT_PARAM))
      ->setSenderChat(Chat::create($up->sender_chat ?? self::DEFAULT_PARAM))
      ->setDate($up->date)
      ->setChat(Chat::create($up->chat))
      ->setForwardFrom(User::create($up->forward_from ?? self::DEFAULT_PARAM))
      ->setForwardFromChat(Chat::create($up->forward_from_chat ?? self::DEFAULT_PARAM))
      ->setForwardFromMessageId($up->forward_from_message_id ?? self::DEFAULT_PARAM)
      ->setForwardSignature($up->forward_signature ?? self::DEFAULT_PARAM)
      ->setForwardSenderName($up->forward_sender_name ?? self::DEFAULT_PARAM)
      ->setForwardDate($up->forward_date ?? self::DEFAULT_PARAM)
      ->setIsAutomaticForward($up->is_automatic_forward ?? false)
      ->setReplyToMessage(Message::create($up->reply_to_message ?? self::DEFAULT_PARAM))
      ->setViaBot(User::create($up->via_bot ?? self::DEFAULT_PARAM))
      ->setEditDate($up->edit_date ?? self::DEFAULT_PARAM)
      ->setHasProtectedContent($up->has_protected_content ?? false)
      ->setMediaGroupId($up->media_group_id ?? self::DEFAULT_PARAM)
      ->setAuthorSignature($up->author_signature ?? self::DEFAULT_PARAM)
      ->setText($up->text ?? self::DEFAULT_PARAM)
      ->setEntities(MessageEntity::bulkCreate($up->entities ?? self::DEFAULT_PARAM))
      ->setAnimation(Animation::create($up->animation ?? self::DEFAULT_PARAM))
      ->setAudio(Audio::create($up->audio ?? self::DEFAULT_PARAM))
      ->setDocument(Document::create($up->document ?? self::DEFAULT_PARAM))
      ->setPhoto(PhotoSize::bulkCreate($up->photo ?? self::DEFAULT_PARAM))
      ->setSticker(Sticker::create($up->sticker ?? self::DEFAULT_PARAM))
      ->setVideo(Video::create($up->video ?? self::DEFAULT_PARAM))
      ->setVideoNote(VideoNote::create($up->video_note ?? self::DEFAULT_PARAM))
      ->setVoice(Voice::create($up->voice ?? self::DEFAULT_PARAM))
      ->setCaption($up->caption ?? self::DEFAULT_PARAM)
      ->setCaptionEntities(MessageEntity::bulkCreate($up->caption_entities ?? self::DEFAULT_PARAM))
      ->setContact(Contact::create($up->contact ?? self::DEFAULT_PARAM))
      ->setDice(Dice::create($up->dice ?? self::DEFAULT_PARAM))
      ->setGame(Game::create($up->game ?? self::DEFAULT_PARAM))
      ->setPoll(Poll::create($up->poll ?? self::DEFAULT_PARAM))
      ->setVenue(Venue::create($up->venue ?? self::DEFAULT_PARAM))
      ->setLocation(Location::create($up->location ?? self::DEFAULT_PARAM))
      ->setNewChatMembers(User::bulkCreate($up->new_chat_members ?? self::DEFAULT_PARAM))
      ->setLeftChatMember(User::create($up->left_chat_member ?? self::DEFAULT_PARAM))
      ->setNewChatTitle($up->new_chat_title ?? self::DEFAULT_PARAM)
      ->setNewChatPhoto(PhotoSize::bulkCreate($up->new_chat_photo ?? self::DEFAULT_PARAM))
      ->setDeleteChatPhoto($up->delete_chat_photo ?? self::DEFAULT_PARAM)
      ->setGroupChatCreated($up->group_chat_created ?? self::DEFAULT_PARAM)
      ->setSupergroupChatCreated($up->supergroup_chat_created ?? self::DEFAULT_PARAM)
      ->setChannelChatCreated($up->channel_chat_created ?? self::DEFAULT_PARAM)
      ->setMessageAutoDeleteTimerChanged(MessageAutoDeleteTimerChanged::create($up->message_auto_delete_timer_changed ?? self::DEFAULT_PARAM))
      ->setMigrateToChatId($up->migrate_to_chat_id ?? self::DEFAULT_PARAM)
      ->setMigrateFromChatId($up->migrate_from_chat_id ?? self::DEFAULT_PARAM)
      ->setPinnedMessage(Message::create($up->pinned_message ?? self::DEFAULT_PARAM))
      ->setInvoice(Invoice::create($up->invoice ?? self::DEFAULT_PARAM))
      ->setSuccessfulPayment(SuccessfulPayment::create($up->successful_payment ?? self::DEFAULT_PARAM))
      ->setConnectedWebsite($up->connected_website ?? self::DEFAULT_PARAM)
      ->setPassportData(PassportData::create($up->passport_data ?? self::DEFAULT_PARAM))
      ->setProximityAlertTriggered(ProximityAlertTriggered::create($up->proximity_alert_triggered ?? self::DEFAULT_PARAM))
      ->setForumTopicCreated(ForumTopicCreated::create($up->forum_topic_created ?? self::DEFAULT_PARAM))
      ->setForumTopicClosed(ForumTopicClosed::create($up->forum_topic_closed ?? self::DEFAULT_PARAM))
      ->setForumTopicReopened(ForumTopicReopened::create($up->forum_topic_reopened ?? self::DEFAULT_PARAM))
      ->setVideoChatScheduled(VideoChatScheduled::create($up->video_chat_scheduled ?? self::DEFAULT_PARAM))
      ->setVideoChatStarted(VideoChatStarted::create($up->video_chat_started ?? self::DEFAULT_PARAM))
      ->setVideoChatEnded(VideoChatEnded::create($up->video_chat_ended ?? self::DEFAULT_PARAM))
      ->setVideoChatParticipantsInvited(VideoChatParticipantsInvited::create($up->video_chat_participants_invited ?? self::DEFAULT_PARAM))
      ->setWebbAppData(WebAppData::create($up->webb_app_data ?? self::DEFAULT_PARAM))
      ->setReplyMarkup(InlineKeyboardMarkup::create($up->reply_markup ?? self::DEFAULT_PARAM));
  }

  public function setMessageId(int $messageId): Message
  {
    $this->message_id = $messageId;
    return $this;
  }

  public function setFrom(?User $from): Message
  {
    $this->from = $from;
    return $this;
  }

  public function setSenderChat(?Chat $senderChat): Message
  {
    $this->sender_chat = $senderChat;
    return $this;
  }

  public function setDate(int $date): Message
  {
    $this->date = $date;
    return $this;
  }

  public function setChat(Chat $chat): Message
  {
    $this->chat = $chat;
    return $this;
  }

  public function setForwardFrom(?User $forwardFrom): Message
  {
    $this->forward_from = $forwardFrom;
    return $this;
  }

  public function setForwardFromChat(?Chat $forwardFromChat): Message
  {
    $this->forward_from_chat = $forwardFromChat;
    return $this;
  }

  public function setForwardFromMessageId(?int $forwardFromMessageId): Message
  {
    $this->forward_from_message_id = $forwardFromMessageId;
    return $this;
  }

  public function setForwardSignature(?string $forwardSignature): Message
  {
    $this->forward_signature = $forwardSignature;
    return $this;
  }

  public function setForwardSenderName(?string $forwardSenderName): Message
  {
    $this->forward_sender_name = $forwardSenderName;
    return $this;
  }

  public function setForwardDate(?int $forwardDate): Message
  {
    $this->forward_date = $forwardDate;
    return $this;
  }

  public function setIsAutomaticForward(bool $isAutomaticForward): Message
  {
    $this->is_automatic_forward = $isAutomaticForward;
    return $this;
  }

  public function setReplyToMessage(?Message $replyToMessage): Message
  {
    $this->reply_to_message = $replyToMessage;
    return $this;
  }

  public function setViaBot(?User $viaBot): Message
  {
    $this->via_bot = $viaBot;
    return $this;
  }

  public function setEditDate(?int $editDate): Message
  {
    $this->edit_date = $editDate;
    return $this;
  }

  public function setHasProtectedContent(?bool $hasProtectedContent = true): Message
  {
    $this->has_protected_content = $hasProtectedContent;
    return $this;
  }

  public function setMediaGroupId(?int $mediaGroupId): Message
  {
    $this->media_group_id = $mediaGroupId;
    return $this;
  }

  public function setAuthorSignature(?string $authorSignature): Message
  {
    $this->author_signature = $authorSignature;
    return $this;
  }

  public function setText(?string $text): Message
  {
    $this->text = $text;
    return $this;
  }

  public function setEntities(?array $entities): Message
  {
    $this->entities = $entities;
    return $this;
  }

  public function setAnimation(?Animation $animation): Message
  {
    $this->animation = $animation;
    return $this;
  }

  public function setAudio(?Audio $audio): Message
  {
    $this->audio = $audio;
    return $this;
  }

  public function setDocument(?Document $document): Message
  {
    $this->document = $document;
    return $this;
  }

  public function setPhoto(?array $photo): Message
  {
    $this->photo = $photo;
    return $this;
  }

  public function setSticker(?Sticker $sticker): Message
  {
    $this->sticker = $sticker;
    return $this;
  }

  public function setVideo(?Video $video): Message
  {
    $this->video = $video;
    return $this;
  }

  public function setVideoNote(?VideoNote $videoNote): Message
  {
    $this->video_note = $videoNote;
    return $this;
  }

  public function setVoice(?Voice $voice): Message
  {
    $this->voice = $voice;
    return $this;
  }

  public function setCaption(?string $caption): Message
  {
    $this->caption = $caption;
    return $this;
  }

  public function setCaptionEntities(?array $captionEntities): Message
  {
    $this->caption_entities = $captionEntities;
    return $this;
  }

  public function setContact(?Contact $contact): Message
  {
    $this->contact = $contact;
    return $this;
  }

  public function setDice(?Dice $dice): Message
  {
    $this->dice = $dice;
    return $this;
  }

  public function setGame(?Game $game): Message
  {
    $this->game = $game;
    return $this;
  }

  public function setPoll(?Poll $poll): Message
  {
    $this->poll = $poll;
    return $this;
  }

  public function setVenue(?Venue $venue): Message
  {
    $this->venue = $venue;
    return $this;
  }

  public function setLocation(?Location $location): Message
  {
    $this->location = $location;
    return $this;
  }

  public function setNewChatMembers(?array $newChatMembers): Message
  {
    $this->new_chat_members = $newChatMembers;
    return $this;
  }

  public function setLeftChatMember(?User $leftChatMember): Message
  {
    $this->left_chat_member = $leftChatMember;
    return $this;
  }

  public function setNewChatTitle(?string $newChatTitle): Message
  {
    $this->new_chat_title = $newChatTitle;
    return $this;
  }

  public function setNewChatPhoto(?array $newChatPhoto): Message
  {
    $this->new_chat_photo = $newChatPhoto;
    return $this;
  }

  public function setDeleteChatPhoto(?bool $deleteChatPhoto = true): Message
  {
    $this->delete_chat_photo = $deleteChatPhoto;
    return $this;
  }

  public function setGroupChatCreated(?bool $groupChatCreated = true): Message
  {
    $this->group_chat_created = $groupChatCreated;
    return $this;
  }

  public function setSupergroupChatCreated(?bool $supergroupChatCreated = true): Message
  {
    $this->supergroup_chat_created = $supergroupChatCreated;
    return $this;
  }

  public function setChannelChatCreated(?bool $channelChatCreated = true): Message
  {
    $this->channel_chat_created = $channelChatCreated;
    return $this;
  }

  public function setMessageAutoDeleteTimerChanged(?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged): Message
  {
    $this->message_auto_delete_timer_changed = $messageAutoDeleteTimerChanged;
    return $this;
  }

  public function setMigrateToChatId(?int $migrateToChatId): Message
  {
    $this->migrate_to_chat_id = $migrateToChatId;
    return $this;
  }

  public function setMigrateFromChatId(?int $migrateFromChatId): Message
  {
    $this->migrate_from_chat_id = $migrateFromChatId;
    return $this;
  }

  public function setPinnedMessage(?Message $pinnedMessage): Message
  {
    $this->pinned_message = $pinnedMessage;
    return $this;
  }

  public function setInvoice(?Invoice $invoice): Message
  {
    $this->invoice = $invoice;
    return $this;
  }

  public function setSuccessfulPayment(?SuccessfulPayment $successfulPayment): Message
  {
    $this->successful_payment = $successfulPayment;
    return $this;
  }

  public function setConnectedWebsite(?string $connectedWebsite): Message
  {
    $this->connected_website = $connectedWebsite;
    return $this;
  }

  public function setPassportData(?PassportData $passportData): Message
  {
    $this->passport_data = $passportData;
    return $this;
  }

  public function setProximityAlertTriggered(?ProximityAlertTriggered $proximityAlertTriggered): Message
  {
    $this->proximity_alert_triggered = $proximityAlertTriggered;
    return $this;
  }

  public function setForumTopicCreated(?ForumTopicCreated $forumTopicCreated): Message
  {
    $this->forum_topic_created = $forumTopicCreated;
    return $this;
  }

  public function setForumTopicClosed(?ForumTopicClosed $forumTopicClosed): Message
  {
    $this->forum_topic_closed = $forumTopicClosed;
    return $this;
  }

  public function setForumTopicReopened(?ForumTopicReopened $forumTopicReopened): Message
  {
    $this->forum_topic_reopened = $forumTopicReopened;
    return $this;
  }

  public function setVideoChatScheduled(?VideoChatScheduled $videoChatScheduled): Message
  {
    $this->video_chat_scheduled = $videoChatScheduled;
    return $this;
  }
  
  public function setVideoChatStarted(?VideoChatStarted $videoChatStarted): Message
  {
    $this->video_chat_started = $videoChatStarted;
    return $this;
  }

  public function setVideoChatEnded(?VideoChatEnded $videoChatEnded): Message
  {
    $this->video_chat_ended = $videoChatEnded;
    return $this;
  }

  public function setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $videoChatParticipantsInvited): Message
  {
    $this->video_chat_participants_invited = $videoChatParticipantsInvited;
    return $this;
  }

  public function setWebbAppData(?WebAppData $webAppData): Message
  {
    $this->web_app_data = $webAppData;
    return $this;
  }

  public function setReplyMarkUp(?InlineKeyboardMarkup $replyMarkup): Message
  {
    $this->reply_markup = $replyMarkup;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
