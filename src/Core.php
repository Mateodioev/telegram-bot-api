<?php

namespace Mateodioev\Bots\Telegram;

use Mateodioev\Bots\Telegram\Config\Types as TypesConfig;
use Mateodioev\Bots\Telegram\Http\AsyncClient;
use Mateodioev\Bots\Telegram\Http\HttpException;
use Mateodioev\Bots\Telegram\Http\SyncClient;
use Mateodioev\Bots\Telegram\Types\Response;
use Mateodioev\Bots\Telegram\Exception\{TelegramParamException, TelegramApiException};
use Mateodioev\Bots\Telegram\Interfaces\{MethodInterface, TelegramInterface, TypesInterface};
use Mateodioev\Bots\Telegram\Types\Error;
use Mateodioev\Request\{Request, ResponseException};
use Mateodioev\Bots\Telegram\Http\Request as HttpClient;
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
  public bool $async = false;

  protected string $api_link;
  protected string $file_link; // File to download
  protected string $token;
  protected ?HttpClient $client = null;

  public array $opt = [];
  public string $endpoint;
  public $result;

  /**
   * @param string $token Telegram bot token
   * @param string $endpoint Telegram(support local bot api server) bot endpoint
   * @throws TelegramApiException
   * @throws TelegramParamException
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
   * @throws TelegramParamException
   */
  public function setToken(string $token): static
  {
    if (empty($token)) throw new TelegramParamException('Token empty');

    $this->token = $token;
    return $this;
  }

  /**
   * Enable test environments
   */
  public function setTestEnvironment(bool $isTestEnvironment = false): static
  {
    if ($isTestEnvironment) {
      $this->api_link .= 'test/';
      $this->file_link .= 'test/';
    }

    return $this;
  }

  /**
   * Enable/Disable async request
   */
  public function setAsync(bool $async = true): static
  {
    $this->async = $async;
    return $this;
  }


  public function getClient(): HttpClient
  {
    if ($this->client instanceof HttpClient) {
      return $this->client;
    }

    return $this->client = ($this->async)
      ? new AsyncClient
      : new SyncClient;
  }

  /**
   * Call telegram api method
   * @throws RequestException
   * @throws TelegramApiException
   */
  public function request(MethodInterface $method): TypesInterface|stdClass|array
  {
    if (empty($method->getMethod())) {
      throw new TelegramParamException('Method can\'t be empty');
    }

    $this->endpoint = $this->api_link . $method->getMethod();

    $datas = array_merge($method->getParams(), $this->opt);

    $request = $this->getClient()->new($this->endpoint, $datas)
      ->setTimeout($this->timeout);

    try {
      $this->result = $request->run()->toStdClass();
    } catch (HttpException $th) {
      throw new TelegramApiException('Fail to send method ' . $method->getMethod() . '. ' . $th->getMessage(), previous: $th);
    }

    $this->opt = []; // reset opt

    return $this->parseRequestResult($method);
  }

  private function parseRequestResult(MethodInterface $method): mixed
  {
    $return = $method->getReturn();
    $returnType = $return[0] ?? Response::class;
    $methodName = $return[1] ? 'bulkCreate' : 'create';

    if ($return[0] === null) return $this->result;

    if ($this->result->ok) {
      try {
        if ($returnType === Response::class) {
	      return $returnType::$methodName($this->result);
        }
        return $returnType::$methodName($this->result->result);

      } catch (\Throwable) {
        return $return[0]::$methodName($this->result);
      }
    }

    $error = new Error($this->result);

    if (TypesConfig::$throwOnFail) {
      $message = '(' . ($error->error_code ?? '400') . ') ' . ($error->description ?? 'Unknown error');
      throw new TelegramApiException($message, $error->error_code);
    }

    return new Error($this->result);
  }

  /**
   * Download file sent to the bot
   *
   * @param string $file_path Use `$this->request(Method::create(['file_id' => 'bot-file_id'], 'getFile')->setReturnType(File::class))` to get file path
   * @param string $destination Document name to save the file
   */
  public function download(string $file_path, string $destination, int $timeout = 30): bool
  {
    $fh = fopen($destination, 'w');

	$req = Request::GET($this->file_link)
		->addOpts([
			CURLOPT_FILE => $fh,
			CURLOPT_TIMEOUT => $timeout
        ]);

    try {
      $res = $req->Run($file_path);

      return ($res->toJson(true) !== $res);
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
  public function addOpt(array $opts): static
  {
    $this->opt = array_merge($this->opt, $opts);
    return $this;
  }
}
