<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;

use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * Abstract base class for all attributes in list HTML-Tags
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
abstract class AbstractList extends Body
{
	#region properties
	protected string|null $type	/** @property List-item-marker-type-of-the-inner-(li)-elements */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractList();
	}
	#endregion

	#region getter / setter
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractList(): void
	{
		if (isset($this->attributes['type'])) { $this->type = $this->attributes['type']; }
	}
	#endregion
}
?>