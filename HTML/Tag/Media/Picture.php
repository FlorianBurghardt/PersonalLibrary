<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Picture extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Picture; }
		parent::__construct($attributes);
	}
	#endregion
}
?>