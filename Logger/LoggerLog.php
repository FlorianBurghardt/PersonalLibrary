<?php
#region usings
namespace de\PersonalLibrary\Logger;

use de\PersonalLibrary\Modules\JSON;
use de\PersonalLibrary\Logger\Enum\LogLevel;
#endregion

/**
 * Log file logger [Singelton]
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class LoggerLog extends Logger
{
	#region properties
	private string $logArea;
	private static array $instances = array();
	#endregion

	#region constructor
	protected function __construct(string $logArea)
	{
		parent::__construct();
		$this->logArea = $logArea;
		$this->makeDir($_SERVER['config']['log']['log_dir']);
		$this->makeDir($_SERVER['config']['log']['log_dir']."/".$logArea);
	}
	private function __clone() {}
	public static function getInstance(string $logArea): LoggerLog
	{
		if (!isset(self::$instances[$logArea])) { self::$instances[$logArea] = new LoggerLog($logArea); }
		return self::$instances[$logArea];
	}
	public static function getInstances(): array { return self::$instances; }
	#endregion
	
	#region methods
	public function log(string|array $message, LogLevel $logLevel = LogLevel::INFO): void
	{
		$currentLogLevel = LogLevel::ALL->value;
		foreach (LogLevel::cases() as $item)
		{
			if ($item->name === $_SERVER['config']['log']['log_level'])
			{
				$currentLogLevel = $item->value;
				break;
			}
		}
		if (
			$currentLogLevel !== LogLevel::NOTHING->value &&
			$logLevel->value <= $currentLogLevel)
		{
			if (!is_string($message)) { $message = JSON::encode($message); }
			date_default_timezone_set('Europe/Berlin');
			error_log(
				"[".$logLevel->name."] [".date('d.m.Y H:i:s')."] ". $message."\n",
				3,
				"./".$_SERVER['config']['log']['log_dir']."/".$this->logArea."/".date('d-m-Y').".log");
		}
	}
	
	private function makeDir(string $logArea): void
	{
		if(!is_dir($logArea)) { mkdir($logArea); }
	}
	#endregion
}
?>