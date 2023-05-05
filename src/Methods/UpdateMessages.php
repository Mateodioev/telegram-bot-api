<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Buttons;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{InputMedia, Message, Poll};

/**
 * The following methods allow you to change an existing message in the message history instead of sending a new one with a result of an action. This is most useful for messages with inline keyboards using callback queries, but can also help reduce clutter in conversations with regular chat bots.
 * @see https://core.telegram.org/bots/api#updating-messages
 */
trait UpdateMessages
{
    /**
     * Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise Response is returned.
     * @see https://core.telegram.org/bots/api#editmessagetext
     */
    public function editMessageText(string $text, array $params = []): TypesInterface
    {
        $method = Method::create(['text' => $text, ...$params], 'editMessageText');

        if (!$this->isInline($method)) {
            // if inline_message_id is not set, the method return Message object
            $method->setReturnType(Message::class);
        }
        return $this->request($method);
    }

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @see https://core.telegram.org/bots/api#editmessagecaption
     */
    public function editMessageCaption(string $caption, array $params): TypesInterface
    {
        $method = Method::create(['caption' => $caption, ...$params], 'editMessageCaption');

        if (!$this->isInline($method)) {
            // if inline_message_id is not set, the method return Message object
            $method->setReturnType(Message::class);
        }

        return $this->request($method);
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages.
     * If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise.
     * When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL.
     * On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * 
     * ```php
     * // Edit photo message
     * $api->editmessagemedia(InputMediaPhoto::createFromArray(['type' => 'photo', 'media' => sendInputFile::fromLocal('path/to/my/photo'), 'caption' => 'New caption']), ['chat_id' => 11111111, 'message_id' => 99999])
     * // yeah, is a lot of params...
     * ```
     * @link https://core.telegram.org/bots/api#editmessagemedia
     */
    public function editMessageMedia(InputMedia $media, array $params = []): TypesInterface
    {
        $method = Method::create(['media' => $media->get(), ...$params], 'editMessageMedia');

        if (!$this->isInline($method)) {
            $method->setReturnType(Message::class);
        }

        return $this->request($method);
    }

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @see https://core.telegram.org/bots/api#editmessagereplymarkup
     */
    public function editMessageReplyMarkup(array $params): TypesInterface
    {
        $method = Method::create($params, 'editMessageReplyMarkup');

        if (!$this->isInline($method)) {
            // if inline_message_id is not set, the method return Message object
            $method->setReturnType(Message::class);
        }

        return $this->request($method);
    }

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     * @see https://core.telegram.org/bots/api#stoppoll
     */
    public function stopPoll(string|int $chat_id, int $message_id, ?Buttons $reply_markup = null): TypesInterface
    {
        $params = ['chat_id' => $chat_id, 'message_id' => $message_id];
        if ($reply_markup) $params['reply_markup'] = (string) $reply_markup;

        return $this->request(
            Method::create($params, 'stopPoll')->setReturnType(Poll::class)
        );
    }

    /**
     * Use this method to delete a message, including service messages.
     * @see https://core.telegram.org/bots/api#deletemessage
     */
    public function deleteMessage(string|int $chat_id, int $message_id): TypesInterface
    {
        return $this->request(
            Method::create(['chat_id' => $chat_id, 'message_id' => $message_id], 'deleteMessage')
        );
    }

    /**
     * Return true if `inline_message_id` is set, and `chat_id`, `message_id` not exists
     */
    private function isInline(Method $method): bool
    {
        $params = $method->getParams();

        return isset($params['inline_message_id'])
            && !isset($params['chat_id'])
            && !isset($params['message_id']);
    }
}