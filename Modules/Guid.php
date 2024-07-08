<?php
#region usings
namespace de\PersonalLibrary\Modules;
#endregion

/**
 * Static class for Guid generation
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Guid
{
	#region public static methods
	/**
     * Generates a new Guid
	 * @return string New Guid
	 */
	public static function newGuid(): string
	{
        $guid = strtolower(bin2hex(openssl_random_pseudo_bytes(16)));
        $guid = substr($guid, 0, 8) . '-' . substr($guid, 8, 4) . '-' . substr($guid, 12, 4) . '-' . substr($guid, 16, 4) . '-' . substr($guid, 20, 12);
        return $guid;
	}
	#endregion
}
?>