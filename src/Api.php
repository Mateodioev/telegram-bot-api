<?php

namespace Mateodioev\Bots\Telegram;

use UnexpectedValueException;
use Mateodioev\Request\Request;
use Mateodioev\Utils\Exceptions\RequestException;
use Mateodioev\Utils\Strings;
use stdClass;

use function json_decode, array_merge;

/**
 * Make request to telegram bot-api
 */
class Api
{
  public const VERSION  = '6.0';
  public const URL_BASE = 'https://api.telegram.org/bot';
  public int $timeout = 5;
  private string $api_link;
  private string $token;

  public array $opt = [];
  public string $endpoint;
  public $result;

  /**
   * Constructor
   * 
   * @param string $token Telegram bot token
   * @param string $endpoint Telegram(support local bot api server) bot endpoint
   */
  public function __construct(string $token, string $api_link = self::URL_BASE)
  {
    if (empty($token)) throw new UnexpectedValueException('Token empty');
    
    $this->token = $token;
    $this->api_link = $api_link . $token . '/';

    if (Strings::IsValidUrl($api_link) === false) {
      throw new UnexpectedValueException("Invalid api link: $api_link");
    }
    $this->endpoint = $this->api_link;
  }

  /**
   * Call telegram api method
   * 
   * @param string $method Telegram api method
   * @param array $datas Telegram api method params
   */
  public function request(string $method, array $datas=[]): stdClass
  {
    if (empty($method)) throw new UnexpectedValueException('Method cant no be empty');
    
    $this->endpoint = $this->api_link . $method;

    $datas = array_merge($datas, $this->opt);

    $request = Request::post($this->endpoint);
    $request->addOpts([CURLOPT_TIMEOUT => $this->timeout, CURLOPT_POSTFIELDS => $datas]);

    $res = $request->Run(null);
    $res->toJson(true);
    if ($res->isError()) {
      throw new RequestException('Fail to send method ' . $method . '. ' . $request->error->msg);
    }

    
    $this->result = $res->getBody();
    $this->opt = []; // reset opt
    return $this->result;
  }

  /**
   * Get the api link
   */
  public function GetApiLink(): string
  {
    return $this->api_link;
  }

  /**
   * Get the token
   */
  public function GetToken(): string
  {
    return $this->token;
  }

  /** 
   * Add new options params to the actual method
   */
  public function AddOpt(array $opts)
  {
    $this->opt = array_merge($this->opt, $opts);
    return $this;
  }
}
