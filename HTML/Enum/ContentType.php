<?php
#region usings
namespace de\PersonalLibrary\HTML\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/08/02
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
enum ContentType: string
{
	case CONTENT = 'CONTENT';		// Content tag or string
	case JSON_FILE = 'JSON_FILE';	// JSON file or file array
}
?>