<?php

namespace Mateodioev\Bots\Telegram;

use UnexpectedValueException;
use Mateodioev\Request\Request;
use Mateodioev\Utils\Exceptions\RequestException;
use Mateodioev\Utils\Network;
use Mateodioev\Utils\Strings;
use stdClass;

use function json_decode, array_merge;

/**
 * Make request to telegram bot-api
 */
class Api
{
  public const VERSION  = '6.0';
  public const URL_BASE = 'https://api.telegram.org/';
  public int $timeout = 5;
  private string $api_link;
  private string $file_link; // File to download
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

    if (Network::IsValidUrl($api_link) === false) {
      throw new UnexpectedValueException("Invalid api link: $api_link");
    }
    
    $this->token = $token;
    $this->api_link = $api_link . 'bot' . $token . '/';
    $this->file_link = $api_link . 'file/bot' . $token . '/';

    
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
   * Download file sended to the bot
   *
   * @param string $file_path Use `$this->request('getFile', ['file_id' => 'bot-file_id'])` to get file path
   * @param string $destination Document name to save the file
   */
  public function download(string $file_path, string $destination, int $timeout = 30): bool
  {
    $fh = fopen($destination, 'w');

    $req = Request::get($this->file_link, [
      CURLOPT_FILE => $fh,
      CURLOPT_TIMEOUT => $timeout
    ]);

    try {
      $req->Run($file_path);
      return true;
    } catch (\Mateodioev\Utils\Exceptions\RequestException $e) {
      return false;
    }
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
