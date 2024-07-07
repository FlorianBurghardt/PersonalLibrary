<?php
#region usings
namespace de\PersonalLibrary\Response;

use de\PersonalLibrary\Exception\BadRequestException;
#endregion

/**
 * A base class to increase the security in the framework and to prevent the use of magic PHP methods, that are not allowed in the framework.
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
abstract class ForbiddenMethods
{
	#region forbidden methods
	final public function __call(string $name, array $arguments): void
	{
		throw new BadRequestException("Method [$name] does not exist in this class [".get_called_class()."]", 9000);
	}
	final public static function __callStatic(string $name, array $arguments): void
	{
		throw new BadRequestException("Static method [$name] does not exist in this class [".get_called_class()."]", 9001);
	}
	final public function __set($name, $value): void
	{
		throw new BadRequestException("Property [$name] cannot be set in this class [".get_called_class()."]", 9002);
	}
	final public function __get($name): void
	{
		throw new BadRequestException("Property [$name] does not exist in this class [".get_called_class()."]", 9003);
	}
	final public function __isset($name): bool
	{
		throw new BadRequestException("On this property [$name] cannot be checked in this class [".get_called_class()."]", 9004);
	}
	final public function __unset($name): void
	{
		throw new BadRequestException("This property [$name] cannot be unset in this class [".get_called_class()."]", 9005);
	}
	#endregion
}
?>