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

    public function __construct(object $connection)
    {
        $this->setHostName($connection->hostName);
        $this->setDatabase($connection->database);
        $this->setUserName($connection->userName);
        $this->setPassword($connection->password);
        $this->setCharset($connection->charset);
    }

    public function setHostName(string $hostName): void { $this->hostName = $hostName; }
    public function setDatabase(string $database): void { $this->database = $database; }
    public function setUserName(string $userName): void { $this->userName = $userName; }
    public function setPassword(string $password): void { $this->password = $password; }
    public function setCharset(string $charset): void { $this->charset = $charset; }
}
?>