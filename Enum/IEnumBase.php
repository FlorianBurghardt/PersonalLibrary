<?php
#region usings
namespace de\PersonalLibrary\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/06/22
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
interface IEnumBase
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