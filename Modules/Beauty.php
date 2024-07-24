<?php
#region usings
namespace de\PersonalLibrary\Modules;

use de\PersonalLibrary\Modules\JSON;
#endregion

/**
 * This is a class for development, debugging and testing to print different types of information to the screen
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Beauty
{
	#region private properties
	private static string $type;
	private static bool $included = false;
	private static int $spaceSteps = 15/*px*/;
	#endregion

	#region public static methods
	/**
	* Prints several types to the screen for debugging purposes as readable styled output.
	*
	* @param mixed $input The input value. Supported types: Null, Bool, Int, Float, String, JSON, Array, Object, Resource.
	* @param bool $stop (optional) Stops the script if set to true. Default is false.
	* @param string $title (optional) Title printed in Start row. Default is an empty string.
	* @return void
	*/
	public static function print(mixed $input, bool $stop = false, string $title = ''): void
	{
		self::style();
		echo("<div class=beauty>Debug start: ".$title);
		self::itterateThrowContent($input);
		echo("Debug end:</div>");
		if($stop) { exit(); }
	}

	/**
	* Prints several types to the screen for debugging purposes.
	*
	* @param mixed $input The input value. Supported types: Null, Bool, Int, Float, String, JSON, Array, Object, Resource.
	* @param bool $stop (optional) Stops the script if set to true. Default is false.
	* @param string $title (optional) Title printed in Start row. Default is an empty string.
	* @return void
	*/
	public static function debug(mixed $input, bool $stop = false, string $title = ''): void
	{
		self::$type = self::gettype($input);
		if(self::$type == 'null') { $input = 'null'; }
		else if(self::$type == 'boolean') { $input = $input ? 'true' : 'false'; }
		else if(self::$type == 'object') { $input = (array)$input; }
		else if(is_array($input)) { $type = 'Array'; }
		else if(JSON::is_json($input))
		{
			$input = JSON::encode(
				JSON::decode($input),
				JSON_PRETTY_PRINT
			);
		}

		echo("<pre>");
		echo("Debug start: ".$title."<br/>");
		echo("Type: ".self::$type."<br/>");
		print_r($input);
		echo("<br/>");
		echo("Debug end:<br/>");
		echo("</pre>");

		if($stop) { exit(); }
	}
	#endregion

	#region private methods
	private static function itterateThrowContent(mixed $data, int $depth = 0, ?string $key = null): mixed
	{
		if(!is_null($key)) { $key = "<span class=beauty-key>[".$key."]</span>"; }
		else { $key = ''; }

		self::$type = self::gettype($data);

		if (self::$type == 'json')
		{
			$data = JSON::decode($data, false);
		}
		echo("<div style=margin-left:".$depth*self::$spaceSteps."px><span class=beauty-type>".self::$type."</span>".$key);
		if (is_array($data))
		{
			echo("<div class=beauty-marker>[");
			foreach ($data as $key => $value)
			{
				$data[$key] = self::itterateThrowContent($value, $depth + 1, $key);
			}
			echo("]</div></div>");	
		}
		else if (is_object($data))
		{
			$properties = get_object_vars($data);
			echo("<div class=beauty-marker>{");
			foreach ($properties as $key => $value)
			{
				$properties[$key] = self::itterateThrowContent($value, $depth + 1, $key);
			}
			echo("}</div></div>");	
		}
		else
		{
			if(self::$type == 'null') { $data = 'null'; }
			if(self::$type == 'boolean') { $data = $data ? 'true' : 'false'; }
			echo("<span class=beauty-value>".$data."</span>");
			echo('</div>');
		}
		return $data;
	}

	private static function getType(mixed $input): string
	{
		if (is_null($input)) { return 'null'; }
		elseif (is_bool($input)) { return 'boolean'; }
		elseif (is_int($input)) { return 'integer'; }
		elseif (is_float($input)) { return 'float'; }
		elseif (is_object($input)) { return 'object'; }
		elseif (is_array($input)) { return 'array'; }
		elseif (JSON::is_json($input)) { return 'json'; }
		elseif (is_string($input)) { return 'string'; }
		elseif (is_resource($input)) { return 'resource'; }
		else { return 'unknown'; }
	}
	#endregion
	
	#region css styler
	private static function style(): void
	{
		if(self::$included) { return; }
		self::$included = true;
		echo ('<style>' . self::$css . '</style>');
	}

	private static string $css = "
		.beauty { background-color: rgb(34, 34, 34); color: rgb(118, 238, 0); border: 3px solid rgb(102, 217, 239); border-radius: 0.5em; padding: 0.5em; line-height: 1.5em; font-family: monospace; font-size: 1.2em; }
		.beauty-type { color: rgb(54, 169, 255); display: inline-block; min-width: 60px; }
		.beauty-marker { color: rgb(255, 205, 0); }
		.beauty-key { display: inline-block; color: rgb(205, 0, 170); margin-left: 0.5em; }
		.beauty-value { color: rgb(178, 50, 255); margin-left: 0.5em; }
	";
	#endregion
}
?>