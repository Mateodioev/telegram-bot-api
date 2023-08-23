<?php

namespace Tests\Config;

use Mateodioev\Bots\Telegram\Config\ParseMode;
use Mateodioev\Bots\Telegram\Config\strUtils;
use PHPUnit\Framework\TestCase;

class strUtilsTest extends TestCase
{
    /**
     * @dataProvider toSnakeCaseDataSet
     */
    public function testConvertStringToSnakeCase(string $value, string $expected)
    {
        $this->assertEquals($expected, strUtils::toSnakeCase($value));
    }

    public function testScapeTags()
    {
        $this->assertEquals(
            '&lt;strong&gt;Hello&lt;/strong&gt;',
            strUtils::scapeTags('<strong>Hello</strong>', ParseMode::HTML)
        );

        $this->assertTrue(
            strUtils::scapeTags('<strong>Hello</strong>', ParseMode::MARKDOWN) !== '&lt;strong&gt;Hello&lt;/strong&gt;'
        );

        $this->assertEquals(
            '\*Hello\*',
            strUtils::scapeTags('*Hello*', ParseMode::MARKDOWN)
        );

        $this->assertTrue(
            strUtils::scapeTags('*Hello*', ParseMode::HTML) !== '\*Hello\*'
        );
    }

    public function toSnakeCaseDataSet(): array
    {
        return [
            // string toSnake
            ['randomString', 'random_string'],
            ['not_converted', 'not_converted'],
            ['random_String', 'random_string']
        ];
    }
}
