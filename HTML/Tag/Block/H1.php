<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Block;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class H1 extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::H1; }
		parent::__construct($attributes);
	}
	#endregion
}
?>