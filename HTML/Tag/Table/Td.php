<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Table;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractTableCell;
#endregion

class Td extends AbstractTableCell
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Td; }
		parent::__construct($attributes);
	}
	#endregion
}
?>