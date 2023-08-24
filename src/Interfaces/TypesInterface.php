<?php

namespace Mateodioev\Bots\Telegram\Interfaces;

interface TypesInterface
{
	/**
	 * Get all properties
	 */
	public function get(): array;

	/**
	 * Get only properties that not null or false
	 */
	public function getReduced(): array;

	public function toString(int $flags = 0): string;

	/**
	 * Create new instance
	 */
	public static function create(?array $update): ?static;

	public static function bulkCreate(?array $up): ?array;
}
