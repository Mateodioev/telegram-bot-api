<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{BotCommand,
    BotCommandScope,
    BotDescription,
    BotShortDescription,
    Chat,
    ChatAdministratorRights,
    ChatInviteLink,
    ChatMember,
    ChatPermissions,
    File,
    ForumTopic,
    InputFile,
    InputMedia,
    MenuButton,
    MenuButtonCommands,
    MenuButtonDefault,
    MenuButtonWebApp,
    Message,
    MessageId,
    sendPoll,
    Sticker,
    User,
    UserProfilePhotos};
use function count;

/**
 * @api
 */
trait availableMethods
{
    private int $photoSizeLimit = 1250000;
    private int $fileSizeLimit = 1250000;

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * 
     * @see https://core.telegram.org/bots/api#getme
     * @return User
     */
    public function getMe(): TypesInterface
    {
        return $this->request(Method::create([], 'getMe')
            ->setReturnType(User::class));
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally.
     * @see https://core.telegram.org/bots/api#logout
     */
    public function logOut(): TypesInterface
    {
        return $this->request(Method::create([], 'logOut'));
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another.
     * @see https://core.telegram.org/bots/api#close
     */
    public function close(): TypesInterface
    {
        return $this->request(Method::create([], 'close'));
    }

    /**
     * Use this method to send text messages.
     * @see https://core.telegram.org/bots/api#sendmessage
     * @return Message
     */
    public function sendMessage(string|int $chatID, string $text, array $params = []): TypesInterface
    {
        return $this->request(Method::create(['chat_id' => $chatID, 'text' => $text, ...$params])
            ->setMethod('sendMessage')
            ->setReturnType(Message::class));
    }

    /**
     * Use this method to send text messages and pin it.
     * @return Message
     */
    public function sendMessageAndPin(string|int $chatID, string $text, array $params = []): TypesInterface
    {
        $message = $this->sendMessage($chatID, $text, $params);
        $this->pinChatMessage($message->chat->id, $message->message_id);

        return $message;
    }
    /**
     * Use this method to reply to a message. The send message will be a reply to the message specified by the messageId parameter.
     *
     * @see self::sendMessage()
     * @see https://core.telegram.org/bots/api#sendmessage
     * @return Message
     */
    public function replyTo(string|int $chatID, string $text, int $replyToMessageID, array $params = []): TypesInterface
    {
        return $this->sendMessage(
            $chatID,
            $text,
            [
                'reply_to_message_id' => $replyToMessageID,
                ...$params
            ]
        );
    }

    /**
     * Use this method to reply a message.
     *
     * @see self::replyTo()
     * @see https://core.telegram.org/bots/api#sendmessage
     * @return Message
     */
    public function replyToMessage(Message $message, string $text, array $params = []): TypesInterface
    {
        return $this->replyTo(
            $message->chat->id,
            $text,
            $message->message_id,
            $params
        );
    }

    /**
     * Use this method to forward messages of any kind. Service messages can't be forwarded.
     * 
     * @see https://core.telegram.org/bots/api#forwardmessage
     * @return Message
     */
    public function forwardMessage(string|int $chatID, string|int $fromChatId, int $messageId, array $params = []): TypesInterface
    {
        return $this->request(Method::create(['chat_id' => $chatID, 'from_chat_id' => $fromChatId, 'message_id' => $messageId, ...$params])
            ->setMethod('forwardMessage')
            ->setReturnType(Message::class));
    }

    /**
     * @see self::forwardMessage()
     */
    public function forwardAndPinMessage(string|int $chatID, string|int $fromChatId, int $messageId, array $params = []): TypesInterface
    {
        $message = $this->forwardMessage($chatID, $fromChatId, $messageId, $params);
        $this->pinChatMessage($message->chat->id, $message->message_id);

        return $message;
    }

    /**
     * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot.
     * The method is analogous to the method {@see self::forwardMessage}, but the copied message doesn't have a link to the original message.
     * 
     * @see https://core.telegram.org/bots/api#copymessage
     * @return Message
     */
    public function copyMessage(string|int $chatID, string|int $fromChatId, int $messageId, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'from_chat_id' => $fromChatId, 'message_id' => $messageId, ...$params])
                ->setMethod('copyMessage')
                ->setReturnType(MessageId::class)
        );
    }

    /**
     * @see self::copyMessage()
     */
    public function copyAndPinMessage(string|int $chatID, string|int $fromChatId, int $messageId, array $params = []): TypesInterface
    {
        $message = $this->copyMessage($chatID, $fromChatId, $messageId, $params);
        $this->pinChatMessage($message->chat->id, $message->message_id);

        return $message;
    }

    /**
     * Use this method to send photos. 
     *
     * @see https://core.telegram.org/bots/api#sendphoto
     * @return Message
     */
    public function sendPhoto(string|int $chatID, InputFile $photo, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($photo, 'Photo');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'photo' => $photo, ...$params])
                ->setMethod('sendPhoto')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format
     * 
     * @see https://core.telegram.org/bots/api#sendaudio
     * @return Message
     */
    public function sendAudio(string|int $chatID, InputFile $audio, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($audio, 'Audio');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'audio' => $audio, ...$params])
                ->setMethod('sendAudio')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send general files.
     * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @see https://core.telegram.org/bots/api#senddocument
     * @return Message
     */
    public function sendDocument(string|int $chatID, InputFile $document, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($document, 'Document');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'document' => $document, ...$params])
                ->setMethod('sendDocument')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document).
     *
     * @see https://core.telegram.org/bots/api#sendvideo
     * @return Message
     */
    public function sendVideo(string|int $chatID, InputFile $video, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($video, 'Video');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'video' => $video, ...$params])
                ->setMethod('sendVideo')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound).
     * 
     * @see https://core.telegram.org/bots/api#sendanimation
     * @return Message
     */
    public function sendAnimation(string|int $chatID, InputFile $animation, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($animation, 'Animation');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'animation' => $animation, ...$params])
                ->setMethod('sendAnimation')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as [Audio](https://core.telegram.org/bots/api#audio) or [Document](https://core.telegram.org/bots/api#document)).
     *
     * @see https://core.telegram.org/bots/api#sendvoice
     * @return Message
     */
    public function sendVoice(string|int $chatID, InputFile $voice, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($voice, 'Voice');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'voice' => $voice, ...$params])
                ->setMethod('sendVoice')
                ->setReturnType(Message::class)
        );
    }

    /**
     * As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square MPEG4 videos of up to 1 minute long.
     * 
     * @see https://core.telegram.org/bots/api#sendvideonote
     * @return Message
     */
    public function sendVideoNote(string|int $chatID, InputFile $videoNote, array $params = []): TypesInterface
    {
        $this->checkIfReachedFileSizeLimit($videoNote, 'VideoNote');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'video_note' => $videoNote, ...$params])
                ->setMethod('sendVideoNote')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album.
     * Documents and audio files can be only grouped in an album with messages of the same type. 
     * 
     * @param InputMedia[] $media
     * @see https://core.telegram.org/bots/api#sendmediagroup
     * @return Message[]
     */
    public function sendMediaGroup(string|int $chatID, array $media, array $params = []): array
    {
        $len = count($media);

        if ($len < 2 || $len > 10)
            throw new TelegramParamException('Media group must have at least 2 and at most 10 items');

        return $this->request(
            Method::create(['chat_id' => $chatID, 'media' => InputMedia::bulkToJson($media), ...$params])
                ->setMethod('sendMediaGroup')
                ->setReturnType(Message::class, true)
        );
    }

    /**
     * @throws TelegramParamException
     */
    private function checkIfReachedFileSizeLimit(InputFile $file, string $type): void
    {
        $limit = ($type === 'Photo' ? $this->photoSizeLimit : $this->fileSizeLimit);

        if ($file->size() > $limit)
            throw new TelegramParamException($type . ' file is too big');
    }

    /**
     * Use this method to send point on the map.
     *
     * @see https://core.telegram.org/bots/api#sendlocation
     * @return Message
     */
    public function sendLocation(string|int $chatID, float $latitude, float $longitude, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'latitude' => $latitude, 'longitude' => $longitude, ...$params])
                ->setMethod('sendLocation')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send information about a venue. 
     * 
     * @see https://core.telegram.org/bots/api#sendvenue
     * @return Message
     */
    public function sendVenue(string|int $chatID, float $latitude, float $longitude, string $title, string $address, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address, ...$params])
                ->setMethod('sendVenue')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send phone contacts.
     * 
     * @see https://core.telegram.org/bots/api#sendcontact
     * @return Message
     */
    public function sendContact(string|int $chatID, string $phoneNumber, string $firstName, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'phone_number' => $phoneNumber, 'first_name' => $firstName, ...$params])
                ->setMethod('sendContact')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send a native poll. 
     * 
     * @see https://core.telegram.org/bots/api#sendpoll
     * @return Message
     */
    public function sendPoll(string|int $chatID, string $question, sendPoll $options, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create([
                'chat_id'           => $chatID,
                'question'          => $question,
                'options'           => $options->get(),
                'correct_option_id' => $options->getCorrectId(),
                ...$params
            ])
                ->setMethod('sendPoll')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method to send an animated emoji that will display a random value.
     *
     * @see https://core.telegram.org/bots/api#senddice
     * @return Message
     */
    public function sendDice(string|int $chatID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, ...$params])
                ->setMethod('sendDice')
                ->setReturnType(Message::class)
        );
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     *
     * @see https://core.telegram.org/bots/api#sendchataction
     */
    public function sendChatAction(string|int $chatID, string $action, ?int $messageThreadId = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'action' => $action, 'message_thread_id' => $messageThreadId])
                ->setMethod('sendChatAction')
        );
    }

    /**
     * Use this method to get a list of profile pictures for a user.
     * 
     * @see https://core.telegram.org/bots/api#getuserprofilephotos
     * @return UserProfilePhotos
     */
    public function getUserProfilePhotos(int $userID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['user_id' => $userID, ...$params])
                ->setMethod('getUserProfilePhotos')
                ->setReturnType(UserProfilePhotos::class)
        );
    }

    /**
     * Use this method to get basic information about a file and prepare it for downloading.
     *
     * @see https://core.telegram.org/bots/api#getfile
     * @return File
     */
    public function getFile(int $fileID): TypesInterface
    {
        return $this->request(
            Method::create(['file_id' => $fileID])
                ->setMethod('getFile')
                ->setReturnType(File::class)
        );
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel.
     * In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first.
     * 
     * @see https://core.telegram.org/bots/api#banchatmember
     */
    public function banChatMember(string|int $chatID, int $userID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID, ...$params])
                ->setMethod('banChatMember')
        );
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel.
     * 
     * @see https://core.telegram.org/bots/api#unbanchatmember
     */
    public function unbanChatMember(string|int $chatID, int $userID, ?bool $onlyIfBanned = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID, 'only_if_banned' => $onlyIfBanned])
                ->setMethod('unbanChatMember')
        );
    }

    /**
     * Use this method to restrict a user in a supergroup.
     * 
     * @see https://core.telegram.org/bots/api#restrictchatmember
     */
    public function restrictChatMember(string|int $chatID, int $userID, ChatPermissions $permissions, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID, 'permissions' => $permissions->toString(), ...$params])
                ->setMethod('restrictChatMember')
        );
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel.
     *
     * @see https://core.telegram.org/bots/api#promotechatmember
     */
    public function promoteChatMember(string|int $chatID, int $userID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID, ...$params])
                ->setMethod('promoteChatMember')
        );
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot.
     * 
     * @see https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     */
    public function setChatAdministratorCustomTitle(string|int $chatID, int $userID, string $customTitle): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID, 'custom_title' => $customTitle])
                ->setMethod('setChatAdministratorCustomTitle')
        );
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel.
     * 
     * @see https://core.telegram.org/bots/api#banchatsenderchat
     */
    public function banChatSenderChat(string|int $chatID, int $senderChatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'sender_chat_id' => $senderChatID])
                ->setMethod('banChatSenderChat')
        );
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel.
     * 
     * @see https://core.telegram.org/bots/api#unbanchatsenderchat
     */
    public function unbanChatSenderChat(string|int $chatID, int $senderChatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'sender_chat_id' => $senderChatID])
                ->setMethod('unbanChatSenderChat')
        );
    }

    /**
     * Use this method to set default chat permissions for all members.
     * 
     * @see https://core.telegram.org/bots/api#setchatpermissions
     */
    public function setChatPermissions(string|int $chatID, ChatPermissions $permissions, ?bool $useIndependentChatPermissions = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'permissions' => $permissions->toString(), 'use_independent_chat_permissions' => $useIndependentChatPermissions])
                ->setMethod('setChatPermissions')
        );
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked.
     * 
     * @see https://core.telegram.org/bots/api#exportchatinvitelink
     * @return string Chat invite link
     */
    public function exportChatInviteLink(string|int $chatID): string
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('exportChatInviteLink')
        )->result;
    }

    /**
     * Use this method to create an additional invite link for a chat.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#createchatinvitelink
     * @return ChatInviteLink
     */
    public function createChatInviteLink(string|int $chatID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, ...$params])
                ->setMethod('createChatInviteLink')
                ->setReturnType(ChatInviteLink::class)
        );
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#editchatinvitelink
     * @return ChatInviteLink
     */
    public function editChatInviteLink(string|int $chatID, string $inviteLink, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'invite_link' => $inviteLink, ...$params])
                ->setMethod('editChatInviteLink')
                ->setReturnType(ChatInviteLink::class)
        );
    }

    /**
     * Use this method to revoke an invite link created by the bot.
     * If the primary link is revoked, a new link is automatically generated.
     * 
     * @see https://core.telegram.org/bots/api#revokechatinvitelink
     * @return ChatInviteLink
     */
    public function revokeChatInviteLink(string|int $chatID, string $inviteLink): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'invite_link' => $inviteLink])
                ->setMethod('revokeChatInviteLink')
                ->setReturnType(ChatInviteLink::class)
        );
    }

    /**
     * Use this method to approve a chat join request.
     * 
     * @see https://core.telegram.org/bots/api#approvechatjoinrequest
     */
    public function approveChatJoinRequest(string|int $chatID, int $userID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID])
                ->setMethod('approveChatJoinRequest')
        );
    }

    /**
     * Use this method to decline a chat join request.
     *
     * @see https://core.telegram.org/bots/api#declinechatjoinrequest
     */
    public function declineChatJoinRequest(string|int $chatID, int $userID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID])
                ->setMethod('declineChatJoinRequest')
        );
    }

    /**
     * Use this method to set a new profile photo for the chat.
     * Photos can't be changed for private chats.
     *
     * @see https://core.telegram.org/bots/api#setchatphoto
     */
    public function setChatPhoto(string|int $chatID, InputFile $photo): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'photo' => $photo->get()])
                ->setMethod('setChatPhoto')
        );
    }

    /**
     * Use this method to delete a chat photo.
     * Photos can't be changed for private chats. 
     *
     * @see https://core.telegram.org/bots/api#deletechatphoto
     */
    public function deleteChatPhoto(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('deleteChatPhoto')
        );
    }

    /**
     * Use this method to change the title of a chat.
     * Titles can't be changed for private chats.
     *
     * @see https://core.telegram.org/bots/api#setchattitle
     */
    public function setChatTitle(string|int $chatID, string $title): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'title' => $title])
                ->setMethod('setChatTitle')
        );
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel.
     * 
     * @see https://core.telegram.org/bots/api#setchatdescription
     */
    public function setChatDescription(string|int $chatID, ?string $description = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'description' => $description])
                ->setMethod('setChatDescription')
        );
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat.
     * 
     * @see https://core.telegram.org/bots/api#pinchatmessage
     */
    public function pinChatMessage(string|int $chatID, int $messageId, bool $disableNotification = false): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_id' => $messageId, 'disable_notification' => $disableNotification])
                ->setMethod('pinChatMessage')
        );
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat.
     *
     * @see https://core.telegram.org/bots/api#unpinchatmessage
     */
    public function unpinChatMessage(string|int $chatID, int $messageID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_id' => $messageID])
                ->setMethod('unpinChatMessage')
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a chat.
     *
     * @see https://core.telegram.org/bots/api#unpinallchatmessages
     */
    public function unpinAllChatMessages(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('unpinAllChatMessages')
        );
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel.
     * 
     * @see https://core.telegram.org/bots/api#leavechat
     */
    public function leaveChat(string|int $chatID): TypesInterface
    {
        return $this->request(Method::create(['chat_id' => $chatID], 'leaveChat'));
    }

    /**
     * Use this method to get up to date information about the chat
     *
     * @see https://core.telegram.org/bots/api#getchat
     * @return Chat
     */
    public function getChat(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID], 'getChat')
                ->setReturnType(Chat::class)
        );
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots.
     * 
     * @see https://core.telegram.org/bots/api#getchatadministrators
     * @return ChatMember[]
     */
    public function getChatAdministrators(string|int $chatID): array
    {
        return $this->request(
            Method::create(['chat_id' => $chatID], 'getChatAdministrators')
                ->setReturnType(ChatMember::class, true)
        );
    }

    /**
     * Use this method to get information about a member of a chat.
     *
     * @see https://core.telegram.org/bots/api#getchatmembercount
     */
    public function getChatMemberCount(string|int $chatID): int
    {
        return $this->request(
            Method::create(['chat_id' => $chatID], 'getChatMemberCount')
        )->result;
    }

    /**
     * Use this method to get information about a member of a chat.
     * The method is only guaranteed to work for other users if the bot is an administrator in the chat.
     *
     * @see https://core.telegram.org/bots/api#getchatmember
     * @return ChatMember
     */
    public function getChatMember(string|int $chatID, int $userID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'user_id' => $userID])
                ->setMethod('getChatMember')
                ->setReturnType(ChatMember::class)
        );
    }

    /**
     * Use this method to set a new group sticker set for a supergroup.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#setchatstickerset
     */
    public function setChatStickerSet(string|int $chatID, string $stickerSetName): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'sticker_set_name' => $stickerSetName])
                ->setMethod('setChatStickerSet')
        );
    }

    /**
     * Use this method to delete a group sticker set from a supergroup.
     * The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights.
     *
     * @see https://core.telegram.org/bots/api#deletechatstickerset
     */
    public function deleteChatStickerSet(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('deleteChatStickerSet')
        );
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user.
     *
     * @see https://core.telegram.org/bots/api#getforumtopiciconstickers
     * @return Sticker[]
     */
    public function getForumTopicIconStickers(): array
    {
        return $this->request(
            Method::create([], 'getForumTopicIconStickers')
                ->setReturnType(Sticker::class, true)
        );
    }

    /**
     * Use this method to create a topic in a forum supergroup chat.
     * The bot must be an administrator in the chat for this to work and must have the `can_manage_topics` administrator rights.
     *
     * @see https://core.telegram.org/bots/api#createforumtopic
     * @return ForumTopic
     */
    public function createForumTopic(string|int $chatID, string $name, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'name' => $name, ...$params])
                ->setMethod('createForumTopic')
                ->setReturnType(ForumTopic::class)
        );
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#editforumtopic
     */
    public function editForumTopic(string|int $chatID, int $messageThreadID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_thread_id' => $messageThreadID, ...$params])
                ->setMethod('editForumTopic')
        );
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat. 
     *
     * @see https://core.telegram.org/bots/api#closeforumtopic
     */
    public function closeForumTopic(string|int $chatID, int $messageThreadID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_thread_id' => $messageThreadID])
                ->setMethod('closeForumTopic')
        );
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#reopenforumtopic
     */
    public function reopenForumTopic(string|int $chatID, int $messageThreadID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_thread_id' => $messageThreadID])
                ->setMethod('reopenForumTopic')
        );
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#deleteforumtopic
     */
    public function deleteForumTopic(string|int $chatID, int $messageThreadID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_thread_id' => $messageThreadID])
                ->setMethod('deleteForumTopic')
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic.
     * 
     * @see https://core.telegram.org/bots/api#unpinallforumtopicmessages
     */
    public function unpinAllForumTopicMessages(string|int $chatID, int $messageThreadID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_thread_id' => $messageThreadID])
                ->setMethod('unpinAllForumTopicMessages')
        );
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#editgeneralforumtopic
     */
    public function editGeneralForumTopic(string|int $chatID, string $name): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'name' => $name])
                ->setMethod('editGeneralForumTopic')
        );
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat.
     * 
     * @see https://core.telegram.org/bots/api#closegeneralforumtopic
     */
    public function closeGeneralForumTopic(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('closeGeneralForumTopic')
        );
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat.
     *
     * @see https://core.telegram.org/bots/api#reopengeneralforumtopic
     */
    public function reopenGeneralForumTopic(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('reopenGeneralForumTopic')
        );
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat.
     *
     * @see https://core.telegram.org/bots/api#hidegeneralforumtopic
     */
    public function hideGeneralForumTopic(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('hideGeneralForumTopic')
        );
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat.
     *
     * @see https://core.telegram.org/bots/api#unhidegeneralforumtopic
     */
    public function unhideGeneralForumTopic(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('unhideGeneralForumTopic')
        );
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic.
     *
     * @see https://core.telegram.org/bots/api#unpinallgeneralforumtopicmessages
     */
    public function unpinAllGeneralForumTopicMessages(string|int $chatID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('unpinAllGeneralForumTopicMessages')
        );
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards.
     *
     * @see https://core.telegram.org/bots/api#answercallbackquery
     */
    public function answerCallbackQuery(string $callbackQueryID, array $params = []): TypesInterface
    {
        return $this->request(
            Method::create(['callback_query_id' => $callbackQueryID, ...$params])
                ->setMethod('answerCallbackQuery')
        );
    }

    /**
     * Alias of `answerCallbackQuery()`
     *
     * @see self::answerCallbackQuery()
     */
    public function answerCB(string $callbackQueryID, string $text, bool $showAlert = false, array $params = []): TypesInterface
    {
        return $this->answerCallbackQuery($callbackQueryID, [
            'text'       => $text,
            'show_alert' => $showAlert,
            ...$params
        ]);
    }

    /**
     * Use this method to change the list of the bot's commands.
     *
     * @throws TelegramParamException
     * @see https://core.telegram.org/bots/api#setmycommands
     * @see https://core.telegram.org/bots/features#commands
     */
    public function setMyCommands(array $commands, ?BotCommandScope $scope = null, ?string $languageCode = null): TypesInterface
    {
        if ($scope::class === BotCommandScope::class)
            throw new TelegramParamException('Scope must be an instance of BotCommandScope');

        return $this->request(
            Method::create(['commands' => BotCommand::bulkToJson($commands), 'scope' => $scope?->getReduced(), 'language_code' => $languageCode])
                ->setMethod('setMyCommands')
        );
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language.
     *
     * @see https://core.telegram.org/bots/api#deletemycommands
     */
    public function deleteMyCommands(?BotCommandScope $scope = null, ?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['scope' => $scope?->getReduced(), 'language_code' => $languageCode])
                ->setMethod('deleteMyCommands')
        );
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language.
     *
     * @see https://core.telegram.org/bots/api#getmycommands
     */
    public function getMyCommands(?BotCommandScope $scope = null, ?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['scope' => $scope?->getReduced(), 'language_code' => $languageCode])
                ->setMethod('getMyCommands')
        );
    }

    /**
     * Use this method to change the bot's name.
     *
     * @see https://core.telegram.org/bots/api#setmyname
     */
    public function setMyName(?string $name = null, ?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['name' => $name, 'language_code' => $languageCode])
                ->setMethod('setMyName')
        );
    }

    /**
     * Use this method to get the current bot name for the given user language.
     *
     * @see https://core.telegram.org/bots/api#getmyname
     */
    public function getMyName(?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['language_code' => $languageCode])
                ->setMethod('getMyName')
        );
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty.
     *
     * @see https://core.telegram.org/bots/api#setmydescription
     */
    public function setMyDescription(?string $description = null, ?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['description' => $description, 'language_code' => $languageCode])
                ->setMethod('setMyDescription')
        );
    }

    /**
     * Use this method to get the current bot description for the given user language.
     *
     * @see https://core.telegram.org/bots/api#getmydescription
     * @return BotDescription
     */
    public function getMyDescription(?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['language_code' => $languageCode])
                ->setMethod('getMyDescription')
                ->setReturnType(BotDescription::class)
        );
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot.
     *
     * @see https://core.telegram.org/bots/api#setmyshortdescription
     */
    public function setMyShortDescription(?string $shortDescription = null, ?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['short_description' => $shortDescription, 'language_code' => $languageCode])
                ->setMethod('setMyShortDescription')
        );
    }

    /**
     * Use this method to get the current bot short description for the given user language.
     *
     * @see https://core.telegram.org/bots/api#getmyshortdescription
     * @return BotShortDescription
     */
    public function getMyShortDescription(?string $languageCode = null): TypesInterface
    {
        return $this->request(
            Method::create(['language_code' => $languageCode])
                ->setMethod('getMyShortDescription')
                ->setReturnType(BotShortDescription::class)
        );
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button.
     *
     * @see https://core.telegram.org/bots/api#setchatmenubutton
     */
    public function setChatMenuButton(?int $chatID = null, ?MenuButton $menuButton = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'menu_button' => $menuButton?->getReduced()])
                ->setMethod('setChatMenuButton')
        );
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button.
     *
     * @see https://core.telegram.org/bots/api#getchatmenubutton
     */
    public function getChatMenuButton(?int $chatID = null): MenuButton
    {
        $result = $this->request(
            Method::create(['chat_id' => $chatID])
                ->setMethod('getChatMenuButton')
        )->result;

        return match ($result['type']) {
            'commands' => MenuButtonCommands::default(),
            'web_app'  => MenuButtonWebApp::create($result),
            default    => MenuButtonDefault::default()
        };
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels.
     * 
     * @see https://core.telegram.org/bots/api#setmydefaultadministratorrights
     */
    public function setMyDefaultAdministratorRights(?ChatAdministratorRights $rights = null, ?bool $forChannels = null): TypesInterface
    {
        return $this->request(
            Method::create(['rights' => $rights?->getReduced(), 'for_channels' => $forChannels])
                ->setMethod('setMyDefaultAdministratorRights')
        );
    }

    /**
     * Use this method to get the current default administrator rights of the bot.
     *
     * @see https://core.telegram.org/bots/api#getmydefaultadministratorrights
     * @return ChatAdministratorRights
     */
    public function getMyDefaultAdministratorRights(?bool $forChannels = null): TypesInterface
    {
        return $this->request(
            Method::create(['for_channels' => $forChannels])
                ->setMethod('getMyDefaultAdministratorRights')
                ->setReturnType(ChatAdministratorRights::class)
        );
    }
}
