<?php
#region usings
namespace de\PersonalLibrary\HTML\Enum;
#endregion

/**
 * List of supported output types in TafInformation class
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
enum TagListType
{
	case JSON;
	case Array;
	case TagList;
	case SubNamespaceList;
	case PriFormatedEnumList;
}
?>