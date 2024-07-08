<?php
#region usings
namespace de\PersonalLibrary\Logger;

use de\PersonalLibrary\Logger\Enum\LogLevel;
#endregion

/**
 * Logger interface
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
interface ILogger
{
	#region methods
	public static function getInstance(string $logArea): ILogger;
	public function log(string|array $message, LogLevel $logLevel = LogLevel::INFO): void;
	public function error_mail();
	#endregion
}
?>