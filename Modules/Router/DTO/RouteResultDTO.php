<?php
#region usings
namespace de\PersonalLibrary\Modules\Router\DTO;

use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Modules\Router\Interfaces\IRouteController;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2024/06/28
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