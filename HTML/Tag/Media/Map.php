<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Map extends Body
{
	#region properties
	protected string|null $name	/** @property Specifies-the-name-of-the-image-map */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Map; }
		parent::__construct($attributes);
		$this->mapMap();
	}
	#endregion

	#region getter / setter
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapMap(): void
	{
		if (isset($this->attributes['name'])) { $this->name = (string)$this->attributes['name']; }
	}
	#endregion
}
?>