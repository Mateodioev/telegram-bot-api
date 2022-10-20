<?php

namespace Mateodioev\Bots\Telegram\Methods;

use Mateodioev\Bots\Telegram\Types\{InputFile, Poll};
use Mateodioev\Utils\fakeStdClass;

/**
 * Methods for send
 */
trait Senders
{

  /**
   * Use this method to send text messages.
   *
   * @param string|integer $chatId Unique identifier for the target chat or username of the target channel
   * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
   * @param array ...$params Others params
   * @see https://core.telegram.org/bots/api#sendmessage
   */
  public function sendMessage(string|int $chatId, string $text, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'text' => $text, ...$params];

    return $this->request('sendMessage', $payload);
  }

  public function sendPhoto(string|int $chatId, InputFile $photo, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'photo' => $photo->get(), ...$params];

    return $this->request('sendPhoto', $payload);
  }

  public function sendAudio(string|int $chatId, InputFile $audio, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'audio' => $audio->get(), ...$params];

    return $this->request('sendAudio', $payload);
  }

  public function sendDocument(string|int $chatId, InputFile $document, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'document' => $document->get(), ...$params];

    return $this->request('sendDocument', $payload);
  }

  public function sendVideo(string|int $chatId, InputFile $video, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'document' => $video->get(), ...$params];

    return $this->request('sendVideo', $payload);
  }

  public function sendAnimation(string|int $chatId, InputFile $animation, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'animation' => $animation->get(), ...$params];

    return $this->request('sendAnimation', $payload);
  }

  public function sendVoice(string|int $chatId, InputFile $voice, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'voice' => $voice->get(), ...$params];

    return $this->request('sendVoice', $payload);
  }

  public function sendVideoNote(string|int $chatId, InputFile $videoNote, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'video_note' => $videoNote->get(), ...$params];

    return $this->request('sendVideoNote', $payload);
  }

  public function sendMediaGroup(string|int $chatId, array $media, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'media' => $media, ...$params];

    return $this->request('sendMediaGroup', $payload);
  }

  public function sendLocation(string|int $chatId, float $latitude, float $longitude, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'latitude' => $latitude, 'longitude' => $longitude, ...$params];

    return $this->request('sendLocation', $payload);
  }

  public function sendVenue(string|int $chatId, float $latitude, float $longitude, string $title, string $address, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'latitude' => $latitude, 'longitude' => $longitude, 'title' => $title, 'address' => $address, ...$params];

    return $this->request('sendVenue', $payload);
  }

  public function sendContact(string|int $chatId, string $phoneNumber, string $firstName, string $lastName, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'phone_number' => $phoneNumber, 'first_name' => $firstName, 'last_name' => $lastName, ...$params];

    return $this->request('sendContact', $payload);
  }

  public function sendPoll(string|int $chatId, string $question, Poll $options, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'question' => $question, 'options' => $options->get(), ...$params];

    if ($options->getCorrectId() !== null) {
      $payload['correct_option_id'] = $options->getCorrectId();
    }
    return $this->request('sendPoll');
  }

  public function sendDice(string|int $chatId, string $emoji, array $params = []): fakeStdClass
  {
    $payload = ['chat_id' => $chatId, 'emoji' => $emoji, ...$params];

    return $this->request('sendDice', $payload);
  }

  public function sendChatAction(string|int $chatId, string $action): fakeStdClass
  {
    return $this->request('sendChatAction', ['chat_id' => $chatId, 'action' => $action]);
  }
}
