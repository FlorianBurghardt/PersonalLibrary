<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Area;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Main extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Main; }
		parent::__construct($attributes);
	}
	#endregion
}
?>