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

## Create new Api instance

```php
use Mateodioev\Bots\Telegram\Api;

$api = new Api($bot_token);
```


## Send method to telegram api

```php
use Mateodioev\Bots\Telegram\Types\Message;

$message = $api->sendMessage('chat_id', 'Text', $others_params);

var_dump($message->get());
var_dump($message instanceof Message::class);
```

## Enable async mode

Note: This use `amphp/http-client`

```php
$api->setAsync(true);
```

## Create new telegram types

```php
use Mateodioev\Bots\Telegram\Types\abstractType;

class MyCustomType extends abstractType
{
    protected function boot(): void
    {
        $this->fields = [
            'field1'  => FieldType::single('string'),       // Only accept strings
            'id'      => FieldType::optional('integer'),    // only accept integer or null values
            'users'   => FieldType::multiuple(User::class), // only accept arrays or instances of the User class
            'message' => FieldType::mixed(),                // Accept all values
        ];
    }
}
```

*Create new instance*

```php
// from array
$customType = MyCustomType::create(['field1' => 'Type', 'id' => 1111, 'user' => $user]);
// Create from constructor
$customType = new MyCustomType([
    'field1' => 'example value',
    'id' => 123121, // or null
    'users' => [new User], // or an array the follows the properties of the User class. example: [['id' => 1111111, 'first_name' => 'user first name']]
    'message' => [], //  Accept any type of data
]);
```

**See more examples here: [examples/](examples)**