<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a message about the completion of a giveaway with public winners.
 *
 * @property Chat $chat The chat that created the giveaway
 * @property int $giveaway_message_id Identifier of the message with the giveaway in the chat
 * @property int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway were selected
 * @property int $winner_count Total number of winners in the giveaway
 * @property User[] $winners List of up to 100 winners of the giveaway
 * @property int|null $additional_chat_count Optional. The number of other chats the user had to join in order to be eligible for the giveaway
 * @property int|null $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
 * @property int|null $unclaimed_prize_count Optional. Number of undistributed prizes
 * @property bool|null $only_new_members Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
 * @property bool|null $was_refunded Optional. True, if the giveaway was canceled because the payment for it was refunded
 * @property string|null $prize_description Optional. Description of additional giveaway prize
 *
 * @method Chat chat()
 * @method int giveawayMessageId()
 * @method int winnersSelectionDate()
 * @method int winnerCount()
 * @method User[] winners()
 * @method int|null additionalChatCount()
 * @method int|null premiumSubscriptionMonthCount()
 * @method int|null unclaimedPrizeCount()
 * @method bool|null onlyNewMembers()
 * @method bool|null wasRefunded()
 * @method string|null prizeDescription()
 *
 * @method static setChat(Chat $chat)
 * @method static setGiveawayMessageId(int $giveawayMessageId)
 * @method static setWinnersSelectionDate(int $winnersSelectionDate)
 * @method static setWinnerCount(int $winnerCount)
 * @method static setWinners(User[] $winners)
 * @method static setAdditionalChatCount(int|null $additionalChatCount)
 * @method static setPremiumSubscriptionMonthCount(int|null $premiumSubscriptionMonthCount)
 * @method static setUnclaimedPrizeCount(int|null $unclaimedPrizeCount)
 * @method static setOnlyNewMembers(bool|null $onlyNewMembers)
 * @method static setWasRefunded(bool|null $wasRefunded)
 * @method static setPrizeDescription(string|null $prizeDescription)
 *
 * @see https://core.telegram.org/bots/api#giveawaywinners
 */
class GiveawayWinners extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'chat'                             => FieldType::single(Chat::class),
            'giveaway_message_id'              => FieldType::single('integer'),
            'winners_selection_date'           => FieldType::single('integer'),
            'winner_count'                     => FieldType::single('integer'),
            'winners'                          => FieldType::multiple(User::class),
            'additional_chat_count'            => FieldType::optional('integer'),
            'premium_subscription_month_count' => FieldType::optional('integer'),
            'unclaimed_prize_count'            => FieldType::optional('integer'),
            'only_new_members'                 => FieldType::optional('boolean'),
            'was_refunded'                     => FieldType::optional('boolean'),
            'prize_description'                => FieldType::optional('string'),
        ];
    }
}
