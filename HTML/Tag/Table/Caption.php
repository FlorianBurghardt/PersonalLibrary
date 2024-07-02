<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Table;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Caption extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Caption; }
		parent::__construct($attributes);
	}
	#endregion
}
?>