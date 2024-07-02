<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Source extends Body
{
	#region properties
	protected string|null $media	/** @property Different-formats-for-portrait-and-landscape-devices */;
	protected string|null $src		/** @property Specifies-the-URL-of-the-media-file */;
	protected string|null $srcset	/** @property Set_of-different-media-sizes */;
	protected string|null $sizes	/** @property Specifications-for-the-layout-adaptation-use-together-with-srcset */;
	protected string|null $type		/** @property Specifies-the-MIME-type-of-the-resource */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Source; }
		parent::__construct($attributes);
		$this->mapSource();
	}
	#endregion

	#region getter / setter
	public function getMedia(): string|null { return (isset($this->media)) ? $this->media : null; }
	public function setMedia(string|null $media): void { $this->media = $media; }
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getSrcset(): string|null { return (isset($this->srcset)) ? $this->srcset : null; }
	public function setSrcset(string|null $srcset): void { $this->srcset = $srcset; }
	public function getSizes(): string|null { return (isset($this->sizes)) ? $this->sizes : null; }
	public function setSizes(string|null $sizes): void { $this->sizes = $sizes; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->media)) { $result .= ' media="'.$this->media.'"'; }
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->srcset)) { $result .= ' srcset="'.$this->srcset.'"'; }
		if (isset($this->sizes)) { $result .= ' sizes="'.$this->sizes.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapSource(): void
	{
		if (isset($this->attributes['media'])) { $this->media = $this->attributes['media']; }
		if (isset($this->attributes['src'])) { $this->src = $this->attributes['src']; }
		if (isset($this->attributes['srcset'])) { $this->srcset = $this->attributes['srcset']; }
		if (isset($this->attributes['sizes'])) { $this->sizes = $this->attributes['sizes']; }
		if (isset($this->attributes['type'])) { $this->type = $this->attributes['type']; }
	}
	#endregion
}
?>