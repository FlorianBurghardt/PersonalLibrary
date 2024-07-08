<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Head;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
final class Style extends Body
{
	#region properties
	protected string|null $media	/** @property List-of-media-types-in-which-the-document-can-be-displayed */;
	protected string|null $type		/** @property Document-type-(only-one-value-is-possible-"text/css") */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Style; }
		parent::__construct($attributes);
		$this->mapStyle();
	}
	#endregion

	#region getter / setter
	public function getMedia(): string|null { return (isset($this->media)) ? $this->media : null; }
	public function setMedia(string|null $media): void { $this->media = $media; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->media)) { $result .= ' media="'.$this->media.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapStyle(): void
	{
		if (isset($this->attributes['media'])) { $this->media = $this->attributes['media']; }
		if (isset($this->attributes['type'])) { $this->type = $this->attributes['type']; }
	}
	#endregion
}
?>