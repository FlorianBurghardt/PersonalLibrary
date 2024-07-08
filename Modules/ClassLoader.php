<?php
#region usings
namespace de\PersonalLibrary\Modules;
#endregion

/**
 * Autoamtically class finder in namespace structure. Directory(folder) structure have to be the same as the Namespace structure.
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class ClassLoader
{
    #region public static methods
	/**
     * Instantiate automatically ClassLoader. 
     * - To use the ClassLoader:
     * - + Directory(folder) structure have to be the same as the Namespace structure. 
     * - + Defines constant __\_\_ROOT\_\___ , which is nessecary for complete Library using.
     * @param string $root First directory name above the namespace structure, __of called class__.
     * - Example:
     * - - Directory structure: 'C:\xampp\htdocs\my\namespace\structure'
     * - - Then $root shoud be 'htdocs'
     * @return bool true if found, false if not
	 */
    public static function instantiateClassloader(string $root = 'htdocs'): bool
    {
        $rootFound = self::defineRootPath($root);
        if (!$rootFound) { return false; }
        \spl_autoload_register(function (string $class): bool
        {
            // print_r($class."<br/>");
            $class = str_replace("\\","/",$class);
            $class = $class.".php";
        
            $folder_up = "";
        
            for ($x = 0; $x <= 10; $x++)
            {
                if (file_exists($folder_up.$class))
                {
                    // print_r($folder_up.$class."<br/>");
                    require_once($folder_up.$class);
                    return true;
                }
                $folder_up .= "../";
            }
            return false;
        });
        return true;
    }
    #endregion

    #region private static methods
	private static function defineRootPath(string $root = 'htdocs'): bool
	{
        $rootPath = __DIR__;
        $found = false;
        while (!$found && strlen($rootPath) > 1)
        {
            if (str_ends_with($rootPath, $root))
            {
                define('__ROOT__', $rootPath);
                $found = true;
                break;
            }
            $rootPath = dirname($rootPath);
        }
        return $found;
    }
	#endregion
}
?>