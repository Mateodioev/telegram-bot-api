<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Config\Types as TypesConfig;
use Mateodioev\Bots\Telegram\Exception\{TelegramParamException, TelegramApiException};
use Mateodioev\Bots\Telegram\Interfaces\{MethodInterface, TelegramInterface, TypesInterface};
use Mateodioev\Bots\Telegram\Types\Error;
use Mateodioev\Request\{Request, RequestResponse, ResponseException};
use Mateodioev\Utils\Exceptions\RequestException;
use Mateodioev\Utils\Network;
use stdClass;

use function array_merge, json_decode;

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
   * @throws \Mateodioev\Bots\Telegram\Exception\TelegramApiException
   * @throws \Mateodioev\Bots\Telegram\Exception\TelegramParamException
   */
  public function __construct(string $token, string $endpoint = self::URL_BASE)
  {
    $this->setToken($token);

    if (Network::IsValidUrl($endpoint) === false) {
      throw new TelegramParamException("Invalid api link: $endpoint");
    }

    $this->token = $token;
    $this->api_link = $endpoint . 'bot' . $token . '/';
    $this->file_link = $endpoint . 'file/bot' . $token . '/';

    $this->endpoint = $this->api_link;
  }

  /**
   * @throws \Mateodioev\Bots\Telegram\Exception\TelegramParamException
   */
  public function setToken(string $token)
  {
    if (empty($token)) throw new TelegramParamException('Token empty');

    $this->token = $token;
    return $this;
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
   * @throws \Mateodioev\Utils\Exceptions\RequestException
   * @throws \Mateodioev\Bots\Telegram\Exception\TelegramApiException
   */
  public function request(MethodInterface $method): TypesInterface|stdClass
  {
    if (empty($method->getMethod())) {
      throw new TelegramParamException('Method can\'t be empty');
    }

    $this->endpoint = $this->api_link . $method->getMethod();

    $datas = array_merge($method->getParams(), $this->opt);

    $request = Request::post($this->endpoint);
    $request->addOpts([CURLOPT_TIMEOUT => $this->timeout, CURLOPT_POSTFIELDS => $datas]);

    try {
      $res = $request->Run();
      $this->result = json_decode($res->getBody());
    } catch (RequestException $th) {
      throw new TelegramApiException('Fail to send method ' . $method->getMethod() . '. ' . $th->getMessage());
    }

    $this->opt = []; // reset opt

    return $this->parseRequestResult($method);
  }

  private function parseRequestResult(MethodInterface $method): TypesInterface|stdClass
  {
    $return = $method->getReturn();
    $methodName = $return[1] ? 'bulkCreate' : 'create';

    if ($return[0] === null) return $this->result;

    if ($this->result->ok) {
      return $return[0]::$methodName($this->result->result);

    }
    $error = new Error($this->result);

    if (TypesConfig::$throwOnFail) {
      $message = '(' . ($error->error_code ?? '400') . ') ' . ($error->description ?? 'Unknown error');
      throw new TelegramApiException($message, $error->error_code);

    }

    return new Error($this->result);
  }

  /**
   * Download file sended to the bot
   *
   * @param string $file_path Use `$this->request(Method::create(['file_id' => 'bot-file_id'], 'getFile')->setReturnType(File::class))` to get file path
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
