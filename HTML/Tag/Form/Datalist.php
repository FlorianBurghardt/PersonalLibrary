<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Form;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Datalist extends Body
{
	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Datalist; }
		parent::__construct($attributes);
	}
	#endregion
}
?>