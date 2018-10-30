<?php

namespace GollumSF\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class ArrayPipe extends Type {
	const ARRAY_PIPE = 'array_pipe';
	
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
	}
	
	public function getDefaultLength(AbstractPlatform $platform) {
		return $platform->getVarcharDefaultLength();
	}
	
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		if ($value === null) {
			return $value;
		}
		return explode('|', $value);
	}
	
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if ($value === null) {
			return $value;
		}
		return implode('|', $value);
	}
	
	public function getName() {
		return self::ARRAY_PIPE;
	}
}
