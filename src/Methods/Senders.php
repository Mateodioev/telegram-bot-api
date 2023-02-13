<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use Mateodioev\Bots\Telegram\Types\{sendInputFile, sendPoll};
use Mateodioev\Bots\Telegram\Types\{Message};

/**
 * Methods for send
 */
trait Senders
{

  /**
   * Use this method to send text messages.
   * @see https://core.telegram.org/bots/api#sendmessage
   */
  public function sendMessage(string|int $chatId, string $text, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'text' => $text, ...$params])
      ->setMethod('sendMessage')
      ->setReturnType(Message::class));
  }

  /**
   * @see sendMessage
   * @see https://core.telegram.org/bots/api#sendmessage
   */
  public function replyTo(string|int $chatId, string $text, int $replyToMessageId, string $parseMode = 'html', array $params = []): TypesInterface
  {
    return $this->sendMessage($chatId, $text, [
      'reply_to_message_id' => $replyToMessageId,
      'parse_mode' => $parseMode,
      ...$params
    ]);
  }

  public function sendPhoto(string|int $chatId, sendInputFile $photo, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'photo' => $photo->get(), ...$params])
      ->setMethod('sendPhoto')
      ->setReturnType(Message::class));
  }

  public function sendAudio(string|int $chatId, sendInputFile $audio, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'audio' => $audio->get(), ...$params])
      ->setMethod('sendAudio')
      ->setReturnType(Message::class));
  }

  public function sendDocument(string|int $chatId, sendInputFile $document, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'document' => $document->get(), ...$params])
      ->setMethod('sendDocument')
      ->setReturnType(Message::class));
  }

  public function sendVideo(string|int $chatId, sendInputFile $video, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'document' => $video->get(), ...$params])
        ->setMethod('sendVideo')
        ->setReturnType(Message::class));
  }

  public function sendAnimation(string|int $chatId, sendInputFile $animation, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'animation' => $animation->get(), ...$params])
      ->setMethod('sendAnimation')
      ->setReturnType(Message::class));
  }

  public function sendVoice(string|int $chatId, sendInputFile $voice, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'voice' => $voice->get(), ...$params])
      ->setMethod('sendVoice')
      ->setReturnType(Message::class));
  }

  public function sendVideoNote(string|int $chatId, sendInputFile $videoNote, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'video_note' => $videoNote->get(), ...$params])
      ->setMethod('sendVideoNote')
      ->setReturnType(Message::class));
  }

  public function sendMediaGroup(string|int $chatId, array $media, array $params = []): TypesInterface|array
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'media' => $media, ...$params])
      ->setMethod('sendMediaGroup')
      ->setReturnType(Message::class, true));
  }

  public function sendLocation(string|int $chatId, float $latitude, float $longitude, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'latitude' => $latitude, 'longitude' => $longitude, ...$params])
      ->setMethod('sendLocation')
      ->setReturnType(Message::class));
  }

  public function sendVenue(string|int $chatId, float $latitude, float $longitude, string $title, string $address, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address, ...$params])
      ->setMethod('sendVenue')
      ->setReturnType(Message::class));
  }

  public function sendContact(string|int $chatId, string $phoneNumber, string $firstName, string $lastName, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'phone_number' => $phoneNumber, 'first_name' => $firstName, 'last_name' => $lastName, ...$params])
      ->setMethod('sendContact')
      ->setReturnType(Message::class));
  }

  public function sendPoll(string|int $chatId, string $question, sendPoll $options, array $params = []): TypesInterface
  {
    $payload = ['chat_id' => $chatId, 'question' => $question, 'options' => $options->get(), ...$params];
    if ($options->getCorrectId() !== null) {
      $payload['correct_option_id'] = $options->getCorrectId();
    }
    
    return $this->request(Method::create($payload)
      ->setMethod('sendPoll')
      ->setReturnType(Message::class));
  }

  public function sendDice(string|int $chatId, string $emoji, array $params = []): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'emoji' => $emoji, ...$params])
      ->setMethod('sendDice')
      ->setReturnType(Message::class));
  }

  public function sendChatAction(string|int $chatId, string $action): TypesInterface
  {
    return $this->request(Method::create(['chat_id' => $chatId, 'action' => $action])
      ->setMethod('sendChatAction'));
  }
}
