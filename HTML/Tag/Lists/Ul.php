<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Lists;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractList;
#endregion

class Ul extends AbstractList
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Ul; }
		parent::__construct($attributes);
	}
	#endregion
}
?>