<?php

declare(strict_types=1);

namespace Tests\Types;

use Mateodioev\Bots\Telegram\Types\{Animation, Audio, Document, InputMediaAnimation, InputMediaAudio, InputMediaDocument, Message, Sticker, StickerSet, Video, VideoNote};
use PHPUnit\Framework\TestCase;

class CheckTypesHasLegacyParamsTest extends TestCase
{
    public function testAnimation(): void
    {
        $this->markTestSkipped('Removed legacy param');
        $animation = Animation::default();
        $fields = $animation->fields();
        $properties = $animation->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testAudio(): void
    {
        $this->markTestSkipped('Removed legacy param');

        $audio = Audio::default();
        $fields = $audio->fields();
        $properties = $audio->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testDocument(): void
    {
        $document = Document::default();
        $fields = $document->fields();
        $properties = $document->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testInputMediaAnimation(): void
    {
        $inputMediaAnimation = InputMediaAnimation::default();
        $fields = $inputMediaAnimation->fields();
        $properties = $inputMediaAnimation->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testInputMediaAudio(): void
    {
        $inputMediaAudio = InputMediaAudio::default();
        $fields = $inputMediaAudio->fields();
        $properties = $inputMediaAudio->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testInputMediaDocument(): void
    {
        $inputMediaDocument = InputMediaDocument::default();
        $fields = $inputMediaDocument->fields();
        $properties = $inputMediaDocument->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testMessageObject(): void
    {
        // Pass this required param
        $message = Message::create(['date' => 1]);
        $fields = $message->fields();
        $properties = $message->properties();

        $this->assertArrayHasKey('left_chat_participant', $fields);
        $this->assertArrayHasKey('new_chat_participant', $fields);
        $this->assertArrayHasKey('new_chat_member', $fields);
        $this->assertArrayHasKey('forward_from', $fields);
        $this->assertArrayHasKey('forward_from_chat', $fields);
        $this->assertArrayHasKey('forward_from_message_id', $fields);
        $this->assertArrayHasKey('forward_signature', $fields);
        $this->assertArrayHasKey('forward_sender_name', $fields);
        $this->assertArrayHasKey('forward_date', $fields);

        $this->assertArrayHasKey('left_chat_participant', $properties);
        $this->assertArrayHasKey('new_chat_participant', $properties);
        $this->assertArrayHasKey('new_chat_member', $properties);
        $this->assertArrayHasKey('forward_from', $properties);
        $this->assertArrayHasKey('forward_from_chat', $properties);
        $this->assertArrayHasKey('forward_from_message_id', $properties);
        $this->assertArrayHasKey('forward_signature', $properties);
        $this->assertArrayHasKey('forward_sender_name', $properties);
        $this->assertArrayHasKey('forward_date', $properties);
    }

    public function testSticker(): void
    {
        $sticker = Sticker::default();
        $fields = $sticker->fields();
        $properties = $sticker->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testStickerSet(): void
    {
        $stickerSet = StickerSet::default();
        $fields = $stickerSet->fields();
        $properties = $stickerSet->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testVideo(): void
    {
        $video = Video::default();
        $fields = $video->fields();
        $properties = $video->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }

    public function testVideoNote(): void
    {
        $videoNote = VideoNote::default();
        $fields = $videoNote->fields();
        $properties = $videoNote->properties();

        $this->assertArrayHasKey('thumb', $fields);
        $this->assertArrayHasKey('thumb', $properties);
    }
}
