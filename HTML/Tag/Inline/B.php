<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Inline;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class B extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::B; }
		parent::__construct($attributes);
	}
	#endregion
}
?>