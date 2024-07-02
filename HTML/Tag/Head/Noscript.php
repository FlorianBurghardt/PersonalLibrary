<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Head;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Noscript extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Noscript; }
		parent::__construct($attributes);
	}
	#endregion
}
?>