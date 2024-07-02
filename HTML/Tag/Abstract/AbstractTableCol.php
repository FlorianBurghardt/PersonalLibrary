<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;

use de\PersonalLibrary\HTML\Tag\Body;
#endregion

abstract class AbstractTableCol extends Body
{
	#region properties
	protected int|null $span	/** @property Specifies-the-number-of-columns-a-col-should-span */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractTableCol();
	}
	#endregion

	#region getter / setter
	public function getSpan(): int|null { return (isset($this->span)) ? $this->span : null; }
	public function setSpan(int|null $span): void { $this->span = $span; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->span)) { $result .= ' span="'.$this->span.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractTableCol(): void
	{
		if (isset($this->attributes['span'])) { $this->span = (int)$this->attributes['span']; }
	}
	#endregion
}
?>