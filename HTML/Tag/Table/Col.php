<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Table;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractTableCol;
#endregion

class Col extends AbstractTableCol
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Col; }
		parent::__construct($attributes);
	}
	#endregion
}
?>