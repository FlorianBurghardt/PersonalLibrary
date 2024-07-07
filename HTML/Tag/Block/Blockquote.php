<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Block;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Blockquote extends Body
{
	#region properties
	protected string|null $cite	/** @property Source-of-the-quote */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Blockquote; }
		parent::__construct($attributes);
		$this->mapBlockquote();
	}
	#endregion

	#region getter / setter
	public function getCite(): string|null { return (isset($this->cite)) ? $this->cite : null; }
	public function setCite(string|null $cite): void { $this->cite = $cite; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->cite)) { $result .= ' cite="'.$this->cite.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapBlockquote(): void
	{
		if (isset($this->attributes['cite'])) { $this->cite = $this->attributes['cite']; }
	}
	#endregion
}
?>