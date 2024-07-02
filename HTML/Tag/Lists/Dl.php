<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Lists;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Dl extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Dl; }
		parent::__construct($attributes);
	}
	#endregion
}
?>