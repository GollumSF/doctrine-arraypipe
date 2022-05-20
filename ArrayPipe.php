<?php

namespace GollumSF\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class ArrayPipe extends Type {
	const ARRAY_PIPE = 'array_pipe';
	
	/**
	 * @param array $fieldDeclaration
	 * @param AbstractPlatform $platform
	 * @return string
	 */
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		return 'TEXT';
	}
	
	/**
	 * @param $value
	 * @param AbstractPlatform $platform
	 * @return mixed|string[]|null
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		if ($value === null) {
			return $value;
		}
		if ($value === '') {
			return  [];
		}
		return explode('|', $value);
	}
	
	/**
	 * @param $value
	 * @param AbstractPlatform $platform
	 * @return mixed|string|null
	 */
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if ($value === null) {
			return $value;
		}
		return implode('|', $value);
	}
	
	/**
	 * @return string
	 */
	public function getName() {
		return self::ARRAY_PIPE;
	}
}
