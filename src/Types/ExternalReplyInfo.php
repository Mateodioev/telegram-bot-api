<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object contains information about a message that is being replied to, which may come from another chat or forum topic.
 *
 * @property MessageOrigin $origin Origin of the message replied to by the given message
 * @property Chat|null $chat Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel.
 * @property int|null $message_id Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup or a channel.
 * @property LinkPreviewOptions|null $link_preview_options Optional. Options used for link preview generation for the original message, if it is a text message
 * @property Animation|null $animation Optional. Message is an animation, information about the animation
 * @property Audio|null $audio Optional. Message is an audio file, information about the file
 * @property Document|null $document Optional. Message is a general file, information about the file
 * @property PhotoSize[]|null $photo Optional. Message is a photo, available sizes of the photo
 * @property Sticker|null $sticker Optional. Message is a sticker, information about the sticker
 * @property Story|null $story Optional. Message is a forwarded story
 * @property Video|null $video Optional. Message is a video, information about the video
 * @property VideoNote|null $video_note Optional. Message is a video note, information about the video message
 * @property Voice|null $voice Optional. Message is a voice message, information about the file
 * @property bool|null $has_media_spoiler Optional. True, if the message media is covered by a spoiler animation
 * @property Contact|null $contact Optional. Message is a shared contact, information about the contact
 * @property Dice|null $dice Optional. Message is a dice with random value
 * @property Game|null $game Optional. Message is a game, information about the game. More about games: https://core.telegram.org/bots/api#games
 * @property Giveaway|null $giveaway Optional. Message is a scheduled giveaway, information about the giveaway
 * @property GiveawayWinners|null $giveaway_winners Optional. A giveaway with public winners was completed
 * @property Invoice|null $invoice Optional. Message is an invoice for a payment, information about the invoice. More about payments: https://core.telegram.org/bots/api#payments
 * @property Location|null $location Optional. Message is a shared location, information about the location
 * @property Poll|null $poll Optional. Message is a native poll, information about the poll
 * @property Venue|null $venue Optional. Message is a venue, information about the venue
 *
 * @method MessageOrigin origin()
 * @method Chat|null chat()
 * @method int|null messageId()
 * @method LinkPreviewOptions|null linkPreviewOptions()
 * @method Animation|null animation()
 * @method Audio|null audio()
 * @method Document|null document()
 * @method PhotoSize[]|null photo()
 * @method Sticker|null sticker()
 * @method Story|null story()
 * @method Video|null video()
 * @method VideoNote|null videoNote()
 * @method Voice|null voice()
 * @method bool|null hasMediaSpoiler()
 * @method Contact|null contact()
 * @method Dice|null dice()
 * @method Game|null game()
 * @method Giveaway|null giveaway()
 * @method GiveawayWinners|null giveawayWinners()
 * @method Invoice|null invoice()
 * @method Location|null location()
 * @method Poll|null poll()
 * @method Venue|null venue()
 *
 * @method static setOrigin(MessageOrigin $origin)
 * @method static setChat(Chat|null $chat)
 * @method static setMessageId(int|null $messageId)
 * @method static setLinkPreviewOptions(LinkPreviewOptions|null $linkPreviewOptions)
 * @method static setAnimation(Animation|null $animation)
 * @method static setAudio(Audio|null $audio)
 * @method static setDocument(Document|null $document)
 * @method static setPhoto(PhotoSize[]|null $photo)
 * @method static setSticker(Sticker|null $sticker)
 * @method static setStory(Story|null $story)
 * @method static setVideo(Video|null $video)
 * @method static setVideoNote(VideoNote|null $videoNote)
 * @method static setVoice(Voice|null $voice)
 * @method static setHasMediaSpoiler(bool|null $hasMediaSpoiler)
 * @method static setContact(Contact|null $contact)
 * @method static setDice(Dice|null $dice)
 * @method static setGame(Game|null $game)
 * @method static setGiveaway(Giveaway|null $giveaway)
 * @method static setGiveawayWinners(GiveawayWinners|null $giveawayWinners)
 * @method static setInvoice(Invoice|null $invoice)
 * @method static setLocation(Location|null $location)
 * @method static setPoll(Poll|null $poll)
 * @method static setVenue(Venue|null $venue)
 *
 * @see https://core.telegram.org/bots/api#externalreplyinfo
 */
class ExternalReplyInfo extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'origin'               => FieldType::single(MessageOrigin::class),
            'chat'                 => FieldType::optional(Chat::class),
            'message_id'           => FieldType::optional('integer'),
            'link_preview_options' => FieldType::optional(LinkPreviewOptions::class),
            'animation'            => FieldType::optional(Animation::class),
            'audio'                => FieldType::optional(Audio::class),
            'document'             => FieldType::optional(Document::class),
            'photo'                => new FieldType(PhotoSize::class, allowArrays: true, allowNull: true, subTypes: []),
            'sticker'              => FieldType::optional(Sticker::class),
            'story'                => FieldType::optional(Story::class),
            'video'                => FieldType::optional(Video::class),
            'video_note'           => FieldType::optional(VideoNote::class),
            'voice'                => FieldType::optional(Voice::class),
            'has_media_spoiler'    => FieldType::optional('boolean'),
            'contact'              => FieldType::optional(Contact::class),
            'dice'                 => FieldType::optional(Dice::class),
            'game'                 => FieldType::optional(Game::class),
            'giveaway'             => FieldType::optional(Giveaway::class),
            'giveaway_winners'     => FieldType::optional(GiveawayWinners::class),
            'invoice'              => FieldType::optional(Invoice::class),
            'location'             => FieldType::optional(Location::class),
            'poll'                 => FieldType::optional(Poll::class),
            'venue'                => FieldType::optional(Venue::class),
        ];
    }
}
