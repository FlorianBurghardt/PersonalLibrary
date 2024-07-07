<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;

use de\PersonalLibrary\Modules\JSON;
#endregion

/**
 * DTO for output data from database with HTML StatusCode, errorMessage and errorCode (from DatabaseConnector)
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class OutputDTO
{
    public int $count;
    public string $data;
    public int $statusCode;
    public string $errorMessage;
    public int $errorCode;

    public function __construct(object|string|null $output = null)
    {
        if (!is_null($output))
        {
            if (is_string($output)) { $output = JSON::decode($output, false); }
            if (is_object($output))
            {
                if (!empty($output->count)) { $this->count = (int)$output->count; }
                if (!empty($output->data)) { $this->data = $output->data; }
                if (!empty($output->statusCode)) { $this->statusCode = (int)$output->statusCode; }
                if (!empty($output->errorMessage)) { $this->errorMessage = $output->errorMessage; }
                if (!empty($output->errorCode)) { $this->errorCode = (int)$output->errorCode; } 
            }
        }
    }
}
?>