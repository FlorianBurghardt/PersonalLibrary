<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Inline;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Block\Blockquote;
#endregion

class Q extends Blockquote
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Q; }
		parent::__construct($attributes);
	}
	#endregion
}
?>