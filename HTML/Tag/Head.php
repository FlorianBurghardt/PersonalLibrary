<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag;

use de\PersonalLibrary\HTML\Enum\TagList;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Head extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Head; }
		parent::__construct($attributes);
	}
	#endregion
}
?>