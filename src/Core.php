<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Exception\TelegramApiException;
use Mateodioev\Bots\Telegram\Exception\TelegramParamException;
use Mateodioev\Request\{Request, ResponseException};
use Mateodioev\Utils\Exceptions\RequestException;
use Mateodioev\Utils\{Network, fakeStdClass};

use function array_merge;

/**
 * Make request to telegram bot-api
 */
abstract class Core implements TelegramInterface
{
  public const URL_BASE = 'https://api.telegram.org/';
  public int $timeout = 5;

  protected string $api_link;
  protected string $file_link; // File to download
  protected string $token;

  public array $opt = [];
  public string $endpoint;
  public $result;

  /**
   * @param string $token Telegram bot token
   * @param string $endpoint Telegram(support local bot api server) bot endpoint
   * @throws \Mateodioev\Bots\Telegram\TelegramApiException
   * @throws \Mateodioev\Bots\Telegram\TelegramParamException
   */
  public function __construct(string $token, string $endpoint = self::URL_BASE)
  {
    if (empty($token)) throw new TelegramParamException('Token empty');

    if (Network::IsValidUrl($endpoint) === false) {
      throw new TelegramParamException("Invalid api link: $endpoint");
    }

    $this->token = $token;
    $this->api_link = $endpoint . 'bot' . $token . '/';
    $this->file_link = $endpoint . 'file/bot' . $token . '/';

    $this->endpoint = $this->api_link;
  }

  /**
   * Enable test environments
   */
  public function setTestEnviroment(bool $isTestEnviroment = false)
  {
    if ($isTestEnviroment) {
      $this->api_link .= 'test/';
      $this->file_link .= 'test/';
    }

    return $this;
  }

  /**
   * Call telegram api method
   * 
   * @param string $method Telegram api method
   * @param array $datas Telegram api method params
   * @throws \Mateodioev\Utils\Exceptions\RequestException
   */
  public function request(string $method, array $datas=[]): fakeStdClass
  {
    if (empty($method)) throw new TelegramParamException('Method cant no be empty');

    $this->endpoint = $this->api_link . $method;

    $datas = array_merge($datas, $this->opt);

    $request = Request::post($this->endpoint);
    $request->addOpts([CURLOPT_TIMEOUT => $this->timeout, CURLOPT_POSTFIELDS => $datas]);

    try {
      $res = $request->Run();
      $res->toJson(true);
    } catch (RequestException $th) {
      throw new TelegramApiException('Fail to send method ' . $method . '. ' . $th->getMessage());
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
      $res = $req->Run($file_path);

      return ($res->toJson(true) != $res);
    } catch (RequestException | ResponseException) {
      return false;
    } finally {
      fclose($fh);
    }
  }

  /**
   * Get the api link
   */
  public function getApiLink(): string
  {
    return $this->api_link;
  }

  /**
   * Get bot token
   */
  public function getToken(): string
  {
    return $this->token;
  }

  /** 
   * Add new options params to the actual method
   */
  public function addOpt(array $opts)
  {
    $this->opt = array_merge($this->opt, $opts);
    return $this;
  }
}
