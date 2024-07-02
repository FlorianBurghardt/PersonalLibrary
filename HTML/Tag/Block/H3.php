<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Block;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class H3 extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::H3; }
		parent::__construct($attributes);
	}
	#endregion
}
?>