<?php
#region usings
namespace de\PersonalLibrary\Modules;
#endregion

/**
 * This is a class for development, debugging and testing to print different types of information to the screen
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class InputRenderer
{
	#region public static methods
	/**
	 * Prints several types to the screen
	 * @param mixed $input The input value. Supported types: Null, Bool, Int, Float, String, JSON, Array, Object
	 * @param bool $stop Stops the script
	 * @param string $comment Comment printed in Start row
	 * @return void
	 */
	public static function print(mixed $input, bool $stop = false, string $comment = ''): void
	{
		if(is_null($input))									// Type: Null
		{
			$type = 'Null';
			$input = 'null';
		}
		else if(is_bool($input))							// Type: Bool
		{
			$type = 'Bool';
			$input = $input ? 'true' : 'false';
		}
		else if(is_int($input)) { $type = 'Int'; }			// Type: Int
		else if(is_float($input)) { $type = 'Float'; }		// Type: Float
		else if(is_array($input)) { $type = 'Array'; }		// Type: Array
		else if(is_object($input))							// Type: Object
		{
			$type = 'Object';
			$input = (array)$input;
		}
		else if(JSON::is_json($input))						// Type: JSON
		{
			$type = 'JSON';
			$input = JSON::encode(
				JSON::decode($input),
				JSON_PRETTY_PRINT
			);
		}
		else if(is_string($input)) { $type = 'String'; }	// Type: String
		else { $type = 'Not supported format'; }			// Type: Not supported type

		echo("<pre>");
		echo("Display start: ".$comment."<br/>");
		echo("Type: ".$type."<br/>");
		print_r($input);
		echo("<br/>");
		echo("Display end:<br/>");
		echo("</pre>");

		if($stop) { exit(); }
	}
	#endregion
}
?>