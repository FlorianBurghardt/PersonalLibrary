<?php
#region usings
namespace de\PersonalLibrary\Modules;
#endregion

/**
 * JSON transformer class
 * @version 1.0 
 * @version lastUpdate 2023/07/06
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class JSON
{
	#region static methods
	/**
	 * Is JSON string valid
	 * @param string $string Potential JSON string
	 * @return bool True if valid
	 */
	public static function is_json(string $string): bool
	{
		if (is_object($string) || (!str_starts_with($string, '{') && !str_starts_with($string, '['))) { return false; }
		self::decode($string);
		return json_last_error() === JSON_ERROR_NONE;
	}

	/**
	 * Decode JSON string
	 * @param string $json JSON string
	 * @param bool|null $associative 
	 * - True returns assoziative arrays
	 * - False returns objects
	 * - Null returns assoziative arrays or objects depending on JSON_OBJECT_AS_ARRAY is set in flags
	 * @param int $depth Max recursion depth
	 * @param int $flags JSON decode flags
	 * @return mixed Decoded JSON string or false if invalid
	 */
	public static function decode(
		string $json,
		bool|null $associative = null,
		int $depth = 512,
		int $flags = 0): mixed
	{
		$json = json_decode($json, $associative, $depth, $flags);
		if (json_last_error() !== JSON_ERROR_NONE) { return false; }
		return $json;
	}

	/**
	 * Decode JSON string and decode from history log
	 * @param string $json JSON string
	 * @param bool|null $associative 
	 * - True returns assoziative arrays
	 * - False returns objects
	 * - Null returns assoziative arrays or objects depending on JSON_OBJECT_AS_ARRAY is set in flags
	 * @param int $depth Max recursion depth
	 * @param int $flags JSON decode flags
	 * @return mixed
	 */
	public static function decodeHistory(
		string $json,
		bool|null $associative = null,
		int $depth = 512,
		int $flags = 0): mixed
	{
		$json = self::decodeHistoryToJSON($json);
		$json = self::decode($json, $associative, $depth, $flags);
		return $json;
	}

	/**
	 * Decode JSON string and decode from history log
	 * @param string $history encoded History(JSON) string
	 * @return string JSON string
	 */
	public static function decodeHistoryToJSON(string $history): string
	{
		$history = str_replace('|<|', '{', $history);
		$history = str_replace('|>|', '}', $history);
		$history = str_replace('|(|', '[', $history);
		$history = str_replace('|)|', ']', $history);
		$history = str_replace('=', ':', $history);
		$history = str_replace('~', '"', $history);
		return $history;
	}

	/**
	 * Encode JSON string
	 * @param mixed $value Value to encode
	 * @param int $flags JSON encode flags
	 * @param int $depth Max recursion depth
	 * @return string JSON string
	 */
	public static function encode(mixed $value, int $flags = 0, int $depth = 512): string|false
	{
		$value = json_encode($value, $flags, $depth);
		return $value;
	}

	/**
	 * Encode JSON string and format for history log
	 * @param mixed $value Value to encode
	 * @param int $flags JSON encode flags
	 * @param int $depth Max recursion depth
	 * @return string JSON string
	 */
	public static function encodeHistory(mixed $value, int $flags = 0, int $depth = 512): string|false
	{
		$value = self::encode($value, $flags, $depth);
		$value = str_replace('{', '|<|', $value);
		$value = str_replace('}', '|>|', $value);
		$value = str_replace('[', '|(|', $value);
		$value = str_replace(']', '|)|', $value);
		$value = str_replace(':', '=', $value);
		$value = str_replace('"', '~', $value);
		return $value;
	}
	#endregion
}
?>