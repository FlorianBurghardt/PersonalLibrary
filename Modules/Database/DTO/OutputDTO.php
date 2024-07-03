<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;

use de\PersonalLibrary\Enum\StatusCode;
#endregion

/**
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 * @version 1.0
 * @access public
 */
class OutputDTO
{
    public int $count;
    public string $data;
    public int $statusCode;
    public string $errorMessage;
    public int $errorCode;
}
?>