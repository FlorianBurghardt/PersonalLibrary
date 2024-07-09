<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Table;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractTableCell;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Th extends AbstractTableCell
{
	#region properties
	protected string|null $abbr		/** @property Specifies-an-abbreviated-version-of-the-content-in-a-cell */;
	protected string|null $scope	/** @property Specifies-a-header-cell-is-a-header-for-a-column,-row,-or-group */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Th; }
		parent::__construct($attributes);
		$this->mapTh();
	}
	#endregion

	#region getter / setter
	public function getAbbr(): string|null { return (isset($this->abbr)) ? $this->abbr : null; }
	public function setAbbr(string|null $abbr): void { $this->abbr = $abbr; }
	public function getScope(): string|null { return (isset($this->scope)) ? $this->scope : null; }
	public function setScope(string|null $scope): void { $this->scope = $scope; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->abbr)) { $result .= ' abbr="'.$this->abbr.'"'; }
		if (isset($this->scope)) { $result .= ' scope="'.$this->scope.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTh(): void
	{
		if (isset($this->attributes['abbr'])) { $this->abbr = (string)$this->attributes['abbr']; }
		if (isset($this->attributes['scope'])) { $this->scope = (string)$this->attributes['scope']; }
	}
	#endregion
}
?>