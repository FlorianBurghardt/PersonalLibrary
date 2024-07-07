<?php
#region usings
namespace de\PersonalLibrary\Logger\Enum;
#endregion

/**
 * Log levels
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
enum LogLevel: int
{
	case NOTHING = 1;
	case ERROR = 2;
	case WARNING = 3;
	case INFO = 4;

	case ALL = 100; // No matter how many cases there are ALL has to be the greatest value (int)
}
?>