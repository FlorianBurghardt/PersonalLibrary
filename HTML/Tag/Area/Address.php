<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Area;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Address extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Address; }
		parent::__construct($attributes);
	}
	#endregion
}
?>