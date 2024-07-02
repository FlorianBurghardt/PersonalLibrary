<?php
#region usings
namespace de\PersonalLibrary\Logger;

use de\PersonalLibrary\Modules\JSON;
use de\PersonalLibrary\Logger\Enum\LogLevel;
#endregion

/**
 * Screen logger [Singelton]
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class LoggerEcho extends Logger
{
	#region properties
	private static LoggerEcho|null $instance = null;
	#endregion

	#region constructor 
	protected function __construct() {}
	private function __clone() {}
	public static function getInstance(string $logArea): LoggerEcho
	{
		if (self::$instance === null) { self::$instance = new LoggerEcho(); }
		return self::$instance;
	}
	#endregion
	
	#region methods
	public function log(string|array $message, LogLevel $logLevel = LogLevel::INFO): void
	{
		if (!is_string($message)) { $message = JSON::encode($message); }
		echo("[".$logLevel->name."] ".$message."<br/>");
	}
	#endregion
}
?>