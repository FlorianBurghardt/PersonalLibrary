<?php
#region usings
namespace de\PersonalLibrary\Modules;
#endregion

/**
 * Automatic file loader
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class FileLoader
{
	#region public static methods
	/**
	 * Get all files from directory and subdirectories
	 * @param string $dir Directory to scan
	 * @param array $result array to add found files
	 * @return array Found files
	 */
	public static function scan(string $dir = __DIR__, array $result = []): array
	{
		$items = glob($dir);
		foreach ($items as $item)
		{
			if (is_file($item)) { $result[] = $item; }
			if (is_dir($item)) { $result = self::scan($item.'/*', $result); }
		}
		return $result;
	}

	public static function trim(array $arr, string $trimAt, bool $trimAfter = false): array
	{
		$result = [];
		foreach ($arr as $item)
		{
			$lenght = $trimAfter ? strlen($trimAt) : 0;
			$startPos = strpos($item, $trimAt) + $lenght;
			$result[] = substr($item, $startPos);
		}
		return $result;
	}

	public static function addpath(array $arr, string $path): array
	{
		$result = [];
		foreach ($arr as $item)
		{
			$result[] = $path.$item;
		}
		return $result;
	}
	#endregion
}
?>