<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;

use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * Abstract base class for table cells \<td\> and \<th\> HTML-Tags
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
abstract class AbstractTableCell extends Body
{
	#region properties
	protected string|null $headers	/** @property Specifies-one-or-more-cells-a-cell-is-related-to */;
	protected int|null $colspan		/** @property Specifies-the-number-of-columns-a-cell-should-span */;
	protected int|null $rowspan		/** @property Specifies-the-number-of-rows-a-cell-should-span */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractTableCell();
	}
	#endregion

	#region getter / setter
	public function getHeaders(): string|null { return (isset($this->headers)) ? $this->headers : null; }
	public function setHeaders(string|null $headers): void { $this->headers = $headers; }
	public function getColspan(): int|null { return (isset($this->colspan)) ? $this->colspan : null; }
	public function setColspan(int|null $colspan): void { $this->colspan = $colspan; }
	public function getRowspan(): int|null { return (isset($this->rowspan)) ? $this->rowspan : null; }
	public function setRowspan(int|null $rowspan): void { $this->rowspan = $rowspan; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->headers)) { $result .= ' headers="'.$this->headers.'"'; }
		if (isset($this->colspan)) { $result .= ' colspan="'.$this->colspan.'"'; }
		if (isset($this->rowspan)) { $result .= ' rowspan="'.$this->rowspan.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractTableCell(): void
	{
		if (isset($this->attributes['headers'])) { $this->headers = (string)$this->attributes['headers']; }
		if (isset($this->attributes['colspan'])) { $this->colspan = (int)$this->attributes['colspan']; }
		if (isset($this->attributes['rowspan'])) { $this->rowspan = (int)$this->attributes['rowspan']; }
	}
	#endregion
}
?>