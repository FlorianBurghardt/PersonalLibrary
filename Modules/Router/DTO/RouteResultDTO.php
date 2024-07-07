<?php
#region usings
namespace de\PersonalLibrary\Modules\Router\DTO;

use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Modules\Router\Interfaces\IRouteController;
#endregion

/**
 * DTO for route result for generic route controller
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class RouteResultDTO
{
    public string $message;
    public int $innerCode;
    public StatusCode $statusCode;
    public IRouteController $controller;    
}
?>