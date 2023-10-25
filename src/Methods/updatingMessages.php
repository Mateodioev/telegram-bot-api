<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{InlineKeyboardMarkup, InputMedia, Message, Poll, Response};

/**
 * The following methods allow you to change an existing message in the message history instead of sending a new one with a result of an action.
 *
 * @see https://core.telegram.org/bots/api#updating-messages
 */
trait updatingMessages
{
    /**
     * Use this method to edit text and game messages.
     *
     * @see https://core.telegram.org/bots/api#editmessagetext
     * @return Message|Response
     */
    public function editMessageText(string|int $chatID, string $text, array $params = []): TypesInterface
    {
        $result = $this->request(
            Method::create(['chat_id' => $chatID, 'text' => $text, ...$params])
                ->setMethod('editMessageText')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to edit captions of messages.
     *
     * @see https://core.telegram.org/bots/api#editmessagecaption
     * @return Message|Response
     */
    public function editMessageCaption(array $params): TypesInterface
    {
        $result = $this->request(
            Method::create($params)
                ->setMethod('editMessageCaption')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages.
     * If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise.
     *
     * @see https://core.telegram.org/bots/api#editmessagemedia
     * @return Message|Response
     */
    public function editMessageMedia(InputMedia $media, array $params = []): TypesInterface
    {
        if ($media::class === InputMedia::class) {
            throw new TelegramParamException('Media must be a child of InputMedia');
        }

        $result = $this->request(
            Method::create(['media' => $media->getReduced(), ...$params])
                ->setMethod('editMessageMedia')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to edit live location messages.
     * A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation
     *
     * @see https://core.telegram.org/bots/api#editmessagelivelocation
     * @return Message|Response
     */
    public function editMessageLiveLocation(float $latitude, float $longitude, array $params = []): TypesInterface
    {
        $result = $this->request(
            Method::create(['latitude' => $latitude, 'longitude' => $longitude, ...$params])
                ->setMethod('editMessageLiveLocation')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to stop updating a live location message before `live_period` expires.
     *
     * @see https://core.telegram.org/bots/api#stopmessagelivelocation
     * @return Message|Response
     */
    public function stopMessageLiveLocation(array $params): TypesInterface
    {
        $result = $this->request(
            Method::create($params)
                ->setMethod('stopMessageLiveLocation')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to edit only the reply markup of messages.
     *
     * @see https://core.telegram.org/bots/api#editmessagereplymarkup
     * @return Message|Response
     */
    public function editMessageReplyMarkup(array $params): TypesInterface
    {
        $result = $this->request(
            Method::create($params)
                ->setMethod('editMessageReplyMarkup')
        );

        return $this->inlineAsMessage($result);
    }

    /**
     * Use this method to stop a poll which was sent by the bot.
     *
     * @see https://core.telegram.org/bots/api#stoppoll
     * @return Poll
     */
    public function stopPoll(string|int $chatID, int $messageID, ?InlineKeyboardMarkup $replyMarkup = null): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_id' => $messageID, 'reply_markup' => $replyMarkup])
                ->setMethod('stopPoll')
                ->setReturnType(Poll::class)
        );
    }

    /**
     * Use this method to delete a message, including service messages
     *
     * @see https://core.telegram.org/bots/api#deletemessage
     */
    public function deleteMessage(string|int $chatID, int $messageID): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chatID, 'message_id' => $messageID])
                ->setMethod('deleteMessage')
        );
    }

    /**
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @return Message|Response
     */
    private function inlineAsMessage($result): TypesInterface
    {
        $_result = $result->result;
        return isset($_result['via_bot']) ? $result : new Message($_result);
    }
}
