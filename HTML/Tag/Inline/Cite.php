<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Inline;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Cite extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Cite; }
		parent::__construct($attributes);
	}
	#endregion
}
?>