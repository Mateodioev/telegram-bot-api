# Telegram bot api

## Install

```bash
composer require mateodioev/tgbot
```

```bash
git clone https://github.com/Mateodioev/tgbot
```

## First step

```php
require __DIR__ . 'path/to/vendor/autoload.php';
```

### Api
Make request to telegram api
```php
use Mateodioev\Bots\Telegram\Api;
$api = new Api($bot_token, $endpoint);
$api->request('methodName', $params=[]);
```
`$enpoint` Is optional parameter, can be telegram bot api url or custom bot api

### Core
Add magic methods `__call` and `__callStatic`
```php
use Mateodioev\Bots\Telegram\Core;
$core = new Core($bot_token);
// https://core.telegram.org/bots/api#available-methods
$core->sendMessage($params);
```

If you want to use static methods you need some env vars
```php
$_ENV['BOT_TOKEN']; // Bot token
$_ENV['BOT_API_LINK']; // (optional) Telegram bot api link or custom server
```

### Inline
Methods to create results to answer inline query

```php
use Mateodioev\Bots\Telegram\{Inline, Methods};
$methods = new Methods($token);
$inline = new Inline;

$result = $methods->answerInlineQuery($inline_id, [
  // https://core.telegram.org/bots/api#inlinequeryresult
  $inline->Article([
    'title' => 'The world ends in 2030!!',
    'input_message_content' => $inline->InputMessageContent('This is fake news...'),
  ]),
  $inline->Article([
    'title' => 'How to create fake news?',
    'input_message_content' => $inline->InputMessageContent("Too easy ..."),
    'reply_markup' => (string) Buttons::create()->addCeil(['text' => 'learn more here', 'url' => 'https://fake.news'])
  ])
]);
```

### Methods
Default methods

```php
use Mateodioev\Bots\Telegram\Methods;
$methods = new Methods($token);
$methods->method_name($params);
```

### Buttons
Create [keyboards](https://core.telegram.org/bots#keyboards)

```php
use Mateodioev\Bots\Telegram\Buttons;
$button = Buttons::create()
->addCeil(['text' => 'Button 1', 'callback_data' => 'test'])
->addCeil(['text' => "I'm link", 'url' => 'https://t.me/'])
->AddLine()->addCeil(['text' => 'Button in new line', 'url' => 'https://t.me']);

echo $button; // Return JSON object string
```

### TelegramLogger
Activate php log and send to telegram channel

```php
use Mateodioev\Bots\Telegram\TelegramLogger as Logger;

Logger::Activate($dir); // Directory where you want a file with the php logs to be stored
Loger::Warning($message); // send to telegram channel
```
`__callStatic` needs a `$_ENV[CHANNEL_LOG]` with the value of a chat_id where logs are send