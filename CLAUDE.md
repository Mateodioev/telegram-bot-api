# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Testing
- `composer test` - Run PHPUnit tests with colors and testdox format
- `phpunit --testdox tests/ --colors=always` - Direct PHPUnit execution

### Code Quality
- `composer fix` - Run PHP-CS-Fixer to fix code style issues
- `PHP_CS_FIXER_IGNORE_ENV=true php-cs-fixer fix --config=.php-cs-fixer.dist.php -vv` - Direct PHP-CS-Fixer execution

### Code Generation
- `composer gen-type` - Generate Telegram API types from schema
- `php tools/gen-type.php` - Direct type generation script

### Dependencies
- `composer install` - Install dependencies
- `composer install --no-dev` - Install production dependencies only

## Architecture Overview

### Core Components

**Api.php** - Main entry point extending Core class with method traits:
- Uses traits for different API method groups (availableMethods, gettingUpdates, etc.)
- Supports environment-based initialization with `Api::fromEnv()`
- Implements magic method `__call()` for dynamic API method calls

**Core.php** - Abstract base class handling HTTP communication:
- Manages bot token, API endpoints, and HTTP client instances
- Supports both sync and async HTTP clients
- Handles file uploads and downloads
- Provides request/response abstraction

### HTTP Client Architecture

**Dual Client System**:
- `SyncClient` - Traditional blocking HTTP requests using cURL
- `AsyncClient` - Non-blocking requests using Amphp HTTP client
- `SwooleClient` - Specialized client for Swoole environments
- Toggle between sync/async with `$api->setAsync(true/false)`

### Type System

**abstractType.php** - Base class for all Telegram API types:
- Implements type-safe field validation using `FieldType` system
- Supports polymorphic type instantiation with `create()` method
- Handles legacy parameter compatibility (e.g., 'thumb' parameter)
- Provides JSON serialization and string conversion

**Field Type System**:
- `FieldType::single()` - Single value validation
- `FieldType::optional()` - Optional field validation  
- `FieldType::multiple()` - Array/collection validation
- `FieldType::mixed()` - Accept any value type

### Method Organization

Methods are organized into trait groups:
- `availableMethods` - Core bot methods (sendMessage, etc.)
- `gettingUpdates` - Webhook and polling methods
- `updatingMessages` - Message editing methods
- `Stickers` - Sticker management
- `inlineMode` - Inline query handling
- `payments` - Payment processing

### File Handling

**InputFile System**:
- Supports both file uploads and URL references
- Handles CURLFile objects for multipart uploads
- Automatic MIME type detection
- Async file streaming support

## Configuration

### Environment Variables
- `BOT_TOKEN` - Required Telegram bot token
- `BOT_API_LINK` - Optional custom API endpoint (defaults to official Telegram API)
- `TELEGRAM_CHAT_ID` - Test chat ID for phpunit tests

### Test Configuration
- Tests require `BOT_TOKEN` environment variable
- PHPUnit configuration in `phpunit.xml`
- Test suites: "Telegram" (API tests) and "Telegram types" (type validation tests)

## Key Patterns

### Error Handling
- `TelegramApiException` - API-specific errors
- `TelegramParamException` - Parameter validation errors
- `HttpException` - HTTP communication errors
- `InvalidFileException` - File handling errors

### Async Support
- Built on Amphp ecosystem (http-client, file, byte-stream)
- Automatic async/sync client selection
- File operations support async streams
- Cancellation support for long-running operations

### Type Safety
- Strict type declarations throughout
- Runtime type validation for API parameters
- Type-safe response object instantiation
- Legacy parameter compatibility layer