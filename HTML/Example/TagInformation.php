<?php
#region usings
namespace de\PersonalLibrary\HTML\Example;

use de\PersonalLibrary\Modules\JSON;
use de\PersonalLibrary\HTML\Enum\TagListType;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * Display class for development, debugging and testing
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class TagInformation
{
    public static string $path =  'de/PersonalLibrary/HTML/Tag';
    public static array $list = [];

    /**
     * Get a list of all tags with their information about there possible attributes
     * @param TagListType $resultType Type of result format
     * @param bool $printToScreenOrReturn Print to screen (true) or return result (false)
     * @param bool $inheritsFrom [Default: true] If true, inherit from parent class.
     * @param bool $inheritsClassNameincludingNamespace [Default: false] If true, inherit from parent class.
     * @return mixed
     */
    public static function listTagInfos(TagListType $resultType = TagListType::JSON, bool $printToScreenOrReturn = true, bool $inheritsFrom = true, bool $inheritsClassNameincludingNamespace = false): mixed
    {
        self::readDirs();
        $result = self::tagList(
            $resultType,
            $printToScreenOrReturn,
            $inheritsFrom,
            $inheritsClassNameincludingNamespace);
        return $result;
    }
    private static function readDirs(string|null $path = null): void
    {
        if (is_null($path)) { $path = __ROOT__.'/'.self::$path; }
        $dirHandle = opendir($path);
        while($item = readdir($dirHandle))
        {
            $newPath = $path."/".$item;
            if ($item == '.' || $item == '..') { continue; }
            if (is_dir($newPath)) { self::readDirs($newPath); }
            else
            {
                $item = str_replace('.php', '', $newPath);
                self::$list[] = substr($item,strpos($item,self::$path));
            }
        }
    }

    /**
     * Inner method to list all tags
     * @param TagListType $resultType Type of result format
     * @param bool $printToScreenOrReturn Print to screen (true) or return result (false)
     * @param bool $inheritsFrom [Default: true] If true, inherit from parent class.
     * @param bool $inheritsClassNameincludingNamespace [Default: false] If true, inherit from parent class.
     * @return mixed
     */
    private static function tagList(TagListType $resultType, bool $printToScreenOrReturn, bool $inheritsFrom = true, bool $inheritsClassNameincludingNamespace = false): mixed
    {
        $object = new Body(null, 'Body');
        $namespaces = ['Body'=>'Tag'];
        foreach (self::$list as $item)
        {
            $skip = false;
            $skipList = ['Body', 'Abstract'];
            foreach ($skipList as $skipItem)
            {
                if (str_contains($item, $skipItem)) { $skip = true; }
            }
            if (!$skip)
            {
                $item = str_replace('/', '\\', $item);
                $offset = strrpos($item, '\\');
                $object = new $item(null, substr($item, $offset+1));
                $namespaces[substr($item, $offset+1)] = substr(substr($item, 0, $offset), strrpos(substr($item, 0, $offset), '\\')+1);
            }
        }

        switch ($resultType)
        {
            case TagListType::JSON:
                $result = '{';
                $i = 0;
                $elements = $object->getAllTagNames();
                foreach ($elements as $element)
                {
                    if ($i > 0) { $result .= ', '; }
                    $i++;
                    $item = $object::getTagById($element);
                    $result .= '"'.$element.'": '.JSON::encode(
                        $item->getAllPossibleAttributes($inheritsFrom, $inheritsClassNameincludingNamespace));
                    
                }
                $result .= '}';
                if ($printToScreenOrReturn)
                {
                    header_remove();
                    header('Content-Type: application/json');
                    echo($result);
                    exit();
                }
                break;
            case TagListType::Array:
                $elements = $object->getAllTagNames();
                $result = [];
                foreach ($elements as $element)
                {
                    $array = $object::getTagById($element)->getAllPossibleAttributes(
                        $inheritsFrom,
                        $inheritsClassNameincludingNamespace);
                    ksort($array);
                    $result[strtolower($element)] = $array;
                }
                if ($printToScreenOrReturn)
                {
                    echo("<pre>");
                    print_r($result);
                    echo("</pre>");
                    exit();
                }
                break;
            case TagListType::TagList:
                ksort($namespaces);
                $result = '';
                $i = 0;
                foreach ($namespaces as $key => $value)
                {
                    if ($i > 0) { $result .= ','; }
                    $result .= $key;
                    $i++;
                }
                if ($printToScreenOrReturn)
                {
                    echo("<pre>");
                    print_r(str_replace(',','<br/>',$result));
                    echo("</pre>");
                    exit();
                }
                break;
            case TagListType::SubNamespaceList:
                ksort($namespaces);
                asort($namespaces);
                $result = [];
                foreach ($namespaces as $key => $value)
                {
                    if($value == 'Tag') { $result[$key] = ''; }
                    else { $result[$key] = $value; }
                }
                if ($printToScreenOrReturn)
                {
                    echo("<pre>");
                    print_r($result);
                    echo("</pre>");
                    exit();
                }
                break;
            case TagListType::PriFormatedEnumList:
                ksort($namespaces);
                asort($namespaces);
                $result = '';
                foreach ($namespaces as $key => $value)
                {
                    if($value == 'Tag') { $result .= 'case '.$key." = '".$key."';<br/>"; }
                    else { $result .= 'case '.$key." = '".$value.'/'.$key."';<br/>"; }
                }
                echo("<pre>");
                print_r($result);
                echo("</pre>");
                exit();
                break;
            default:
                $result = '';
        }
        return $result;
    }
}
?>