<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractLink;;
#endregion

class Area extends AbstractLink
{
	#region properties
	protected string|null $alt			/** @property Alternative-text-for-the-area */;
	protected string|null $coords		/** @property Coordinates-of-the-area */;
	protected string|null $shape		/** @property Shape-of-the-area */;
	protected bool $download = false	/** @property Specifies-that-the-target-will-be-downloaded-when-a-user-clicks-on-the-hyperlink */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Area; }
		parent::__construct($attributes);
		$this->mapArea();
	}
	#endregion

	#region getter / setter
	public function getAlt(): string|null { return (isset($this->alt)) ? $this->alt : null; }
	public function setAlt(string|null $alt): void { $this->alt = $alt; }
	public function getCoords(): string|null { return (isset($this->coords)) ? $this->coords : null; }
	public function setCoords(string|null $coords): void { $this->coords = $coords; }
	public function getShape(): string|null { return (isset($this->shape)) ? $this->shape : null; }
	public function setShape(string|null $shape): void { $this->shape = $shape; }
	public function getDownload(): bool { return $this->download; }
	public function setDownload(bool $download): void { $this->download = $download; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->alt)) { $result .= ' alt="'.$this->alt.'"'; }
		if (isset($this->coords)) { $result .= ' coords="'.$this->coords.'"'; }
		if (isset($this->shape)) { $result .= ' shape="'.$this->shape.'"'; }
		if ($this->download === true) { $result .= ' download'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapArea(): void
	{
		if (isset($this->attributes['alt'])) { $this->alt = $this->attributes['alt']; }
		if (isset($this->attributes['coords'])) { $this->coords = $this->attributes['coords']; }
		if (isset($this->attributes['shape'])) { $this->shape = $this->attributes['shape']; }
		if (isset($this->attributes['download'])) { $this->download = (bool)$this->attributes['download']; }
	}
	#endregion
}
?>