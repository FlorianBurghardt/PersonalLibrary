<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Block;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Details extends Body
{
	#region properties
	protected bool $open = false	/** @property Deatils-area-is-open-when-value-is-(true) */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Details; }
		parent::__construct($attributes);
		$this->mapDetails();
	}
	#endregion

	#region getter / setter
	public function getOpen(): bool { return $this->open; }
	public function setOpen(bool $open): void { $this->open = $open; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if ($this->open === true) { $result .= ' open'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapDetails(): void
	{
		if (isset($this->attributes['open'])) { $this->open = (bool)$this->attributes['open']; }
	}
	#endregion
}
?>