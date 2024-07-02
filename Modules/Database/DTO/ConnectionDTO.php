<?php
#region usings
namespace de\PersonalLibrary\Modules\Database\DTO;
#endregion

/**
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 * @version 1.0
 * @access public
 */
class ConnectionDTO
{
    public string $hostName;
    public string $database;
    public string $userName;
    public string $password;
    public string $charset;
}
?>