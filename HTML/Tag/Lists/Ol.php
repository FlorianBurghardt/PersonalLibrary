<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Lists;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractList;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Ol extends AbstractList
{
	#region properties
	protected string|null $start		/** @property Specifies-the-start-value-of-an-ordered-list */;
	protected bool $reversed = false	/** @property Specifies-that-the-list-order-should-be-reversed-(9,8,7...) */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Ol; }
		parent::__construct($attributes);
		$this->mapOl();
	}
	#endregion

	#region getter / setter
	public function getStart(): string|null { return (isset($this->start)) ? $this->start : null; }
	public function setStart(string|null $start): void { $this->start = $start; }
	public function getReversed(): bool { return $this->reversed; }
	public function setReversed(bool $reversed): void { $this->reversed = $reversed; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->start)) { $result .= ' start="'.$this->start.'"'; }
		if ($this->reversed === true) { $result .= ' reversed'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOl(): void
	{
		if (isset($this->attributes['start'])) { $this->start = (string)$this->attributes['start']; }
		if (isset($this->attributes['reversed'])) { $this->reversed = (bool)$this->attributes['reversed']; }
	}
	#endregion
}
?>