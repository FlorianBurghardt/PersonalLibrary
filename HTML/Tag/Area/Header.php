<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Area;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Header extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Header; }
		parent::__construct($attributes);
	}
	#endregion
}
?>