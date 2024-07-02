<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Progress extends Body
{
	#region properties
	protected float|null $max		/** @property Defines-the-maximum-value */;
	protected float|null $value		/** @property Defines-the-current-value */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Progress; }
		$this->templateFile = 'double_after.html';
		parent::__construct($attributes);
		$this->mapProgress();
	}
	#endregion

	#region getter / setter
	public function getMax(): float|null { return (isset($this->max)) ? $this->max : null; }
	public function setMax(float|null $max): void { $this->max = $max; }
	public function getValue(): float|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(float|null $value): void { $this->value = $value; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->max)) { $result .= ' max="'.$this->max.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapProgress(): void
	{
		if (isset($this->attributes['max'])) { $this->max = (float)$this->attributes['max']; }
		if (isset($this->attributes['value'])) { $this->value = (float)$this->attributes['value']; }
	}
	#endregion
}
?>