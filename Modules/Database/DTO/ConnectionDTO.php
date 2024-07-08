<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;

use de\PersonalLibrary\Modules\JSON;
#endregion

/**
 * DTO for database connection settings
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class ConnectionDTO
{
    public string $hostName;
    public string $database;
    public string $userName;
    public string $password;
    public string $charset;

    public function __construct(object|string|null $connection = null)
    {
        if (!is_null($connection))
        {
            if (is_string($connection)) { $connection = JSON::decode($connection, false); }
            if (is_object($connection))
            {
                if (!empty($connection->hostName)) { $this->hostName = $connection->hostName; }
                if (!empty($connection->database)) { $this->database = $connection->database; }
                if (!empty($connection->userName)) { $this->userName = $connection->userName; }
                if (!empty($connection->password)) { $this->password = $connection->password; }
                if (!empty($connection->charset)) { $this->charset = $connection->charset; }
            }
        }
    }
}
?>