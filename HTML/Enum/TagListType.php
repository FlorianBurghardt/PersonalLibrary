<?php
#region usings
namespace de\PersonalLibrary\HTML\Enum;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/08/22
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
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