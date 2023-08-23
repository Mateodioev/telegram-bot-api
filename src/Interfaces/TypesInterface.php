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

	/**
	 * Create new instance
	 */
	public static function create(?array $update): ?static;

	public function bulkCreate(?array $up): ?array;
}
