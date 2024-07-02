<?php
#region usings
namespace de\PersonalLibrary\Logger\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
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