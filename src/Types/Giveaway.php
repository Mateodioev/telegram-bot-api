<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\FieldType;

/**
 * This object represents a message about a scheduled giveaway.
 *
 * @property Chat[] $chats The list of chats which the user must join to participate in the giveaway
 * @property int $winners_selection_date Point in time (Unix timestamp) when winners of the giveaway will be selected
 * @property int $winner_count The number of users which are supposed to be selected as winners of the giveaway
 * @property bool|null $only_new_members Optional. True, if only users who join the chats after the giveaway started should be eligible to win
 * @property bool|null $has_public_winners Optional. True, if the list of giveaway winners will be visible to everyone
 * @property string|null $prize_description Optional. Description of additional giveaway prize
 * @property string[]|null $country_codes Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was bought on Fragment can always participate in giveaways.
 * @property int|null $premium_subscription_month_count Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
 *
 * @method Chat[] chats()
 * @method int winnersSelectionDate()
 * @method int winnerCount()
 * @method bool|null onlyNewMembers()
 * @method bool|null hasPublicWinners()
 * @method string|null prizeDescription()
 * @method string[]|null countryCodes()
 * @method int|null premiumSubscriptionMonthCount()
 *
 * @method static setChats(Chat[] $chats)
 * @method static setWinnersSelectionDate(int $winnersSelectionDate)
 * @method static setWinnerCount(int $winnerCount)
 * @method static setOnlyNewMembers(bool|null $onlyNewMembers)
 * @method static setHasPublicWinners(bool|null $hasPublicWinners)
 * @method static setPrizeDescription(string|null $prizeDescription)
 * @method static setCountryCodes(string[]|null $countryCodes)
 * @method static setPremiumSubscriptionMonthCount(int|null $premiumSubscriptionMonthCount)
 *
 * @see https://core.telegram.org/bots/api#giveaway
 */
class Giveaway extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            // Already booted
            return;
        }
        $this->fields = [
            'chats'                            => FieldType::multiple(Chat::class),
            'winners_selection_date'           => FieldType::single('integer'),
            'winner_count'                     => FieldType::single('integer'),
            'only_new_members'                 => FieldType::optional('boolean'),
            'has_public_winners'               => FieldType::optional('boolean'),
            'prize_description'                => FieldType::optional('string'),
            'country_codes'                    => new FieldType('string', allowArrays: true, allowNull: true, subTypes: []),
            'premium_subscription_month_count' => FieldType::optional('integer'),
        ];
    }
}
