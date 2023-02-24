<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Buttons;
use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{Message, Poll};

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

    private function isInline(Method $method): bool
    {
        $params = $method->getParams();

        return isset($params['inline_message_id']);
    }
}