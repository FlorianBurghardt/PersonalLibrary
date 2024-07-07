<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\Enum;
#endregion

/**
 * CRUD request types [GET, PATCH, POST, DELETE] and [OPTIONS] for direct SQL queries
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
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