<?php

declare(strict_types=1);

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Config\{FieldType, FieldsStorage};

/**
 * Represents the rights of a business bot.
 *
 * @property bool|null $can_reply Optional. True, if the bot can send and edit messages in the private chats that had incoming messages in the last 24 hours
 * @property bool|null $can_read_messages Optional. True, if the bot can mark incoming private messages as read
 * @property bool|null $can_delete_sent_messages Optional. True, if the bot can delete messages sent by the bot
 * @property bool|null $can_delete_all_messages Optional. True, if the bot can delete all private messages in managed chats
 * @property bool|null $can_edit_name Optional. True, if the bot can edit the first and last name of the business account
 * @property bool|null $can_edit_bio Optional. True, if the bot can edit the bio of the business account
 * @property bool|null $can_edit_profile_photo Optional. True, if the bot can edit the profile photo of the business account
 * @property bool|null $can_edit_username Optional. True, if the bot can edit the username of the business account
 * @property bool|null $can_change_gift_settings Optional. True, if the bot can change the privacy settings pertaining to gifts for the business account
 * @property bool|null $can_view_gifts_and_stars Optional. True, if the bot can view gifts and the amount of Telegram Stars owned by the business account
 * @property bool|null $can_convert_gifts_to_stars Optional. True, if the bot can convert regular gifts owned by the business account to Telegram Stars
 * @property bool|null $can_transfer_and_upgrade_gifts Optional. True, if the bot can transfer and upgrade gifts owned by the business account
 * @property bool|null $can_transfer_stars Optional. True, if the bot can transfer Telegram Stars received by the business account to its own account, or use them to upgrade and transfer gifts
 * @property bool|null $can_manage_stories Optional. True, if the bot can post, edit and delete stories on behalf of the business account
 *
 * @method bool|null canReply()
 * @method bool|null canReadMessages()
 * @method bool|null canDeleteSentMessages()
 * @method bool|null canDeleteAllMessages()
 * @method bool|null canEditName()
 * @method bool|null canEditBio()
 * @method bool|null canEditProfilePhoto()
 * @method bool|null canEditUsername()
 * @method bool|null canChangeGiftSettings()
 * @method bool|null canViewGiftsAndStars()
 * @method bool|null canConvertGiftsToStars()
 * @method bool|null canTransferAndUpgradeGifts()
 * @method bool|null canTransferStars()
 * @method bool|null canManageStories()
 *
 * @method static setCanReply(bool|null $canReply)
 * @method static setCanReadMessages(bool|null $canReadMessages)
 * @method static setCanDeleteSentMessages(bool|null $canDeleteSentMessages)
 * @method static setCanDeleteAllMessages(bool|null $canDeleteAllMessages)
 * @method static setCanEditName(bool|null $canEditName)
 * @method static setCanEditBio(bool|null $canEditBio)
 * @method static setCanEditProfilePhoto(bool|null $canEditProfilePhoto)
 * @method static setCanEditUsername(bool|null $canEditUsername)
 * @method static setCanChangeGiftSettings(bool|null $canChangeGiftSettings)
 * @method static setCanViewGiftsAndStars(bool|null $canViewGiftsAndStars)
 * @method static setCanConvertGiftsToStars(bool|null $canConvertGiftsToStars)
 * @method static setCanTransferAndUpgradeGifts(bool|null $canTransferAndUpgradeGifts)
 * @method static setCanTransferStars(bool|null $canTransferStars)
 * @method static setCanManageStories(bool|null $canManageStories)
 *
 * @see https://core.telegram.org/bots/api#businessbotrights
 */
class BusinessBotRights extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'can_reply'                      => FieldType::optional('boolean'),
            'can_read_messages'              => FieldType::optional('boolean'),
            'can_delete_sent_messages'       => FieldType::optional('boolean'),
            'can_delete_all_messages'        => FieldType::optional('boolean'),
            'can_edit_name'                  => FieldType::optional('boolean'),
            'can_edit_bio'                   => FieldType::optional('boolean'),
            'can_edit_profile_photo'         => FieldType::optional('boolean'),
            'can_edit_username'              => FieldType::optional('boolean'),
            'can_change_gift_settings'       => FieldType::optional('boolean'),
            'can_view_gifts_and_stars'       => FieldType::optional('boolean'),
            'can_convert_gifts_to_stars'     => FieldType::optional('boolean'),
            'can_transfer_and_upgrade_gifts' => FieldType::optional('boolean'),
            'can_transfer_stars'             => FieldType::optional('boolean'),
            'can_manage_stories'             => FieldType::optional('boolean'),
        ];
        FieldsStorage::instance()->add(static::class, $this->fields);
    }
}
