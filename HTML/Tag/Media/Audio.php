<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractPlayable;
#endregion

class Audio extends AbstractPlayable
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Audio; }
		parent::__construct($attributes);
	}
	#endregion
}
?>