<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Inline;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Block\Blockquote;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Ins extends Blockquote
{
	#region properties
	protected string|null $datetime	/** @property A-machine-readable-value-of-the-datetime */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Ins; }
		parent::__construct($attributes);
		$this->mapIns();
	}
	#endregion

	#region getter / setter
	public function getDatetime(): string|null { return (isset($this->datetime)) ? $this->datetime : null; }
	public function setDatetime(string|null $datetime): void { $this->datetime = $datetime; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->datetime)) { $result .= ' datetime="'.$this->datetime.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapIns(): void
	{
		if (isset($this->attributes['datetime'])) { $this->datetime = (string)$this->attributes['datetime']; }
	}
	#endregion
}
?>