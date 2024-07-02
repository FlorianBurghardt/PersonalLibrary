<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Inline;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Data extends Body
{
	#region properties
	protected string|null $value	/** @property A-machine-readable-value-of-the-data */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Data; }
		parent::__construct($attributes);
		$this->mapData();
	}
	#endregion

	#region getter / setter
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapData(): void
	{
		if (isset($this->attributes['value'])) { $this->value = $this->attributes['value']; }
	}
	#endregion
}
?>