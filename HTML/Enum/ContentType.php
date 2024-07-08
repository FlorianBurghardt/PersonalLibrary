<?php
#region usings
namespace de\PersonalLibrary\HTML\Enum;
#endregion

/**
 * Content type for add method
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
enum ContentType: string
{
	case CONTENT = 'CONTENT';		// Content tag or string
	case JSON_FILE = 'JSON_FILE';	// JSON file or file array
}
?>