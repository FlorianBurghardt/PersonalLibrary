<?php
#region usings
namespace de\PersonalLibrary\Modules\Router\Interfaces;
#endregion

/**
 * Interface for route Enums with methods to search by keyword.
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
interface IRouteEnum
{
	/**
	 * Finds and returns the Enum object by the given keyword.
	 * @param string $keyword The keyword to search for in Enum.
	 * @return self The found Enum object
	 * @throws NotFoundException The keyword is not an element of Enum if not found.
	 * @example Implemenation
	 * * Implementation of IRouteEnum::get():
	 * * public static function get(string $keyword): self { 
	 * foreach (self::cases() as $item) { 
	 * if(strtoupper($item->name) === strtoupper($keyword)) { return $item; } }
	 * throw new NotFoundException($keyword.' is not an element of the Enum', StatusCode::NOT_FOUND->value, 9200); }
	 */
	public static function get(string $keyword): self;

    /**
	 * Finds and returns the Enum object by the given keyword.
	 * @param string $keyword The keyword to search for in Enum.
	 * @return self|null The found Enum object or null if not found.
	 * @example Implemenation
	 * * Implementation of IRouteEnum::tryGet():
	 * * public static function tryGet(string $keyword): self|null { 
	 * foreach (self::cases() as $item) { 
	 * if(strtoupper($item->name) === strtoupper($keyword)) { return $item; } }
	 * return null; }
	 */
	public static function tryGet(string $keyword): self|null;
}
?>