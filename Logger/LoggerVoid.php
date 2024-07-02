<?php
#region usings
namespace de\PersonalLibrary\Logger;

use de\PersonalLibrary\Logger\Enum\LogLevel;
#endregion

/**
 * No logger [Singelton]
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class LoggerVoid extends Logger
{
	#region properties
	private static $instance = null;
	#endregion

	#region constructor
	protected function __construct() {}
	private function __clone() {}
	public static function getInstance(string $logArea): LoggerVoid
	{
		if (self::$instance === null) { self::$instance = new LoggerVoid(); }
		return self::$instance;
	}
	#endregion
	
	#region methods
	public function log(string|array $message, LogLevel $logLevel = LogLevel::INFO): void { /*Do nothing*/ }
	#endregion
}
?>