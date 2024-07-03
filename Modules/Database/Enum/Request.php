<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\Enum;
#endregion

/**
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 * @version 1.0
 * @access public
 */
enum Request
{
    case GET;
    case PATCH;
    case PUT;
    case POST;
    case DELETE;
    case OPTIONS;
}
?>