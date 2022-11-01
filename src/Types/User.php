<?php 

namespace Mateodioev\Bots\Telegram\Types;

use Mateodioev\Bots\Telegram\Interfaces\TypesInterface;
use stdClass;

/**
 * Telegram user or bot
 * 
 * @see https://core.telegram.org/bots/api#user
 */
class User extends TypesBase implements TypesInterface
{
  public int $id                            = 0;
  public bool $is_bot                       = false;
  public ?bool $is_premium                  = false;
  public ?bool $can_join_groups             = true;
  public ?bool $supports_inline_queries     = false;
  public ?bool $added_to_attachment_menu    = false;
  public ?bool $can_read_all_group_messages = false;
  public ?string $username                  = null;
  public ?string $last_name                 = '';
  public string $first_name                 = '';
  public ?string $language_code             = 'en';

  public function __construct(stdClass $up) {
    $this->setId($up->id ?? 0)
    ->setIsBot($up->is_bot ?? false)
    ->setUsername($up->username ?? self::DEFAULT_PARAM)
    ->setLastName($up->last_name ?? self::DEFAULT_PARAM)
    ->setIsPremium($up->is_premium ?? self::DEFAULT_PARAM)
    ->setFirstName($up->first_name ?? '')
    ->setLanguageCode($up->language_code ?? self::DEFAULT_PARAM)
    ->setCanJoinGroups($up->can_join_groups ?? self::DEFAULT_PARAM)
    ->setSupportInlineQueries($up->supports_inline_queries ?? self::DEFAULT_PARAM)
    ->setAddedToAttachmentMenu($up->added_to_attachment_menu ?? self::DEFAULT_PARAM)
    ->setCanReadAllGroupMessages($up->can_read_all_group_messages ?? self::DEFAULT_PARAM);
  }

  public function setId(int $id): User
  {
    $this->id = $id;
    return $this;
  }

  public function setIsBot(bool $bot): User
  {
    $this->is_bot = $bot;
    return $this;
  }

  public function setIsPremium(?bool $isPremium): User
  {
    $this->is_premium = $isPremium;
    return $this;
  }

  public function setCanJoinGroups(?bool $canJoinGroups): User
  {
    $this->can_join_groups = $canJoinGroups;
    return $this;
  }

  public function setSupportInlineQueries(?bool $support): User
  {
    $this->supports_inline_queries = $support;
    return $this;
  }

  public function setAddedToAttachmentMenu(?bool $added): User
  {
    $this->added_to_attachment_menu = $added;
    return $this;
  }

  public function setCanReadAllGroupMessages(?bool $canReadAllGroupMessages): User
  {
    $this->can_read_all_group_messages = $canReadAllGroupMessages;
    return $this;
  }

  public function setUsername(?string $username): User
  {
    $this->username = $username;
    return $this;
  }

  public function setLastName(?string $lastName): User
  {
    $this->last_name = $lastName;
    return $this;
  }

  public function setFirstName(string $firstName): User
  {
    $this->first_name = $firstName;
    return $this;
  }

  public function setLanguageCode(?string $languageCode): User
  {
    $this->language_code = $languageCode;
    return $this;
  }

  public function get()
  {
    return $this->getProperties($this);
  }
}
