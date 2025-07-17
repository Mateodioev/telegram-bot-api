# Telegram Bot API

[![Ask DeepWiki](https://deepwiki.com/badge.svg)](https://deepwiki.com/Mateodioev/telegram-bot-api)

A comprehensive PHP library for interacting with the Telegram Bot API, featuring both synchronous and asynchronous HTTP clients, type-safe API responses, and full support for all Telegram Bot API methods.

## Features

- ✅ **Complete API Coverage** - All Telegram Bot API methods and types
- ✅ **Sync & Async Support** - Choose between blocking and non-blocking HTTP clients
- ✅ **Type Safety** - Strict type validation for all API parameters and responses
- ✅ **File Handling** - Upload and download files with automatic MIME type detection
- ✅ **Webhook Support** - Easy webhook setup and handling
- ✅ **Environment Config** - Simple configuration via environment variables
- ✅ **PSR-4 Autoloading** - Modern PHP standards compliance

## Installation

### Via Composer (Recommended)

```bash
composer require mateodioev/tgbot
```

### Via Git

```bash
git clone https://github.com/Mateodioev/tgbot
```

## Quick Start

### 1. Setup

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Mateodioev\Bots\Telegram\Api;
```

### 2. Create API Instance

```php
// Using bot token directly
$api = new Api('YOUR_BOT_TOKEN');

// Or using environment variables
$api = Api::fromEnv(); // Requires BOT_TOKEN environment variable
```

### 3. Send Your First Message

```php
use Mateodioev\Bots\Telegram\Types\Message;

$message = $api->sendMessage(
    chat_id: 'CHAT_ID',
    text: 'Hello from Telegram Bot API!'
);

// Access message data
echo $message->text;
echo $message->message_id;
```

## Core Concepts

### API Methods

The library provides access to all Telegram Bot API methods through the `Api` class:

```php
// Send messages
$api->sendMessage('chat_id', 'Hello World!');
$api->sendPhoto('chat_id', 'path/to/photo.jpg');
$api->sendDocument('chat_id', 'path/to/document.pdf');

// Manage chats
$api->getChat('chat_id');
$api->getChatMember('chat_id', 'user_id');
$api->kickChatMember('chat_id', 'user_id');

// Handle updates
$updates = $api->getUpdates();
$api->setWebhook('https://example.com/webhook');
```

### Asynchronous Operations

Enable async mode for non-blocking operations using [Amphp](https://amphp.org/):

```php
$api->setAsync(true);

// Now all API calls are non-blocking
$promise = $api->sendMessage('chat_id', 'Async message');
```

### Type System

All API responses are type-safe objects with validation:

```php
use Mateodioev\Bots\Telegram\Types\{Message, User, Chat};

$message = $api->sendMessage('chat_id', 'Hello');

// Type-safe access
$user = $message->from; // User object
$chat = $message->chat; // Chat object
$text = $message->text; // string
```

### Custom Types

Create custom types by extending `abstractType`:

```php
use Mateodioev\Bots\Telegram\Types\abstractType;
use Mateodioev\Bots\Telegram\Types\FieldType;

class MyCustomType extends abstractType
{
    protected function boot(): void
    {
        if ($this->fields !== null) {
            return;
        }
        
        $this->fields = [
            'name'     => FieldType::single('string'),      // Required string
            'age'      => FieldType::optional('integer'),   // Optional integer
            'friends'  => FieldType::multiple(User::class), // Array of User objects
            'metadata' => FieldType::mixed(),               // Any type
        ];
    }
}

// Usage
$custom = MyCustomType::create([
    'name' => 'John Doe',
    'age' => 25,
    'friends' => [new User(['id' => 123, 'first_name' => 'Jane'])],
    'metadata' => ['key' => 'value']
]);
```

## Configuration

### Environment Variables

```bash
BOT_TOKEN=your_bot_token_here
BOT_API_LINK=https://api.telegram.org/bot  # Optional, defaults to official API
TELEGRAM_CHAT_ID=your_test_chat_id         # For testing
```

### HTTP Clients

The library supports multiple HTTP client implementations:

- **SyncClient** - Default blocking HTTP client using cURL
- **AsyncClient** - Non-blocking client using Amphp HTTP Client
- **SwooleClient** - Specialized client for Swoole environments

```php
// Switch between sync and async
$api->setAsync(false); // Sync mode (default)
$api->setAsync(true);  // Async mode
```

## File Handling

### Upload Files

```php
// Upload local file
$api->sendPhoto('chat_id', '/path/to/photo.jpg');

// Upload with CURLFile
$file = new CURLFile('/path/to/document.pdf', 'application/pdf', 'document.pdf');
$api->sendDocument('chat_id', $file);

// Upload from URL
$api->sendPhoto('chat_id', 'https://example.com/photo.jpg');
```

### Download Files

```php
$file = $api->getFile('file_id');
$fileContent = $api->downloadFile($file->file_path);
```

## Development

### Testing

```bash
# Install dependencies
composer install

# Run tests
composer test

# Run tests with coverage
phpunit --testdox tests/ --colors=always
```

### Code Quality

```bash
# Fix code style
composer fix

# Direct PHP-CS-Fixer
php-cs-fixer fix --config=.php-cs-fixer.dist.php -vv
```

### Generate Types

```bash
# Generate Telegram API types from schema
composer gen-type

# Direct script execution
php tools/gen-type.php
```

## Examples

Check out the [examples/](examples) directory for more comprehensive usage examples.

## Architecture

- **Api.php** - Main API class with method traits
- **Core.php** - Base HTTP communication handling
- **Types/** - Type-safe Telegram API objects
- **Clients/** - HTTP client implementations
- **Exceptions/** - Custom exception classes

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

- 📖 [Documentation](https://github.com/Mateodioev/tgbot/wiki)
- 🐛 [Report Issues](https://github.com/Mateodioev/tgbot/issues)
- 💬 [Ask Questions](https://deepwiki.com/Mateodioev/telegram-bot-api)
