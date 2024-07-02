<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;
#endregion

abstract class AbstractLink extends AbstractMedia
{
	#region properties
	protected string|null $href		/** @property Base-URI-or-directory-for-link */;
	protected string|null $hreflang	/** @property Language-code-of-the-linked-resource */;
	protected string|null $media	/** @property Link-target-is-optimized-for-a-specific-device */;
	protected string|null $rel		/** @property A-space-separated-list-of-relationship-types */;
	protected string|null $target	/** @property Target-for-links-(_blank=>new-window,_self=>same-window,...) */;
	protected string|null $type		/** @property Type-of-target-resource */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractLink();
	}
	#endregion

	#region getter / setter
	public function getHref(): string|null { return (isset($this->href)) ? $this->href : null; }
	public function setHref(string|null $href): void { $this->href = $href; }
	public function getHreflang(): string|null { return (isset($this->hreflang)) ? $this->hreflang : null; }
	public function setHreflang(string|null $hreflang): void { $this->hreflang = $hreflang; }
	public function getMedia(): string|null { return (isset($this->media)) ? $this->media : null; }
	public function setMedia(string|null $media): void { $this->media = $media; }
	public function getRel(): string|null { return (isset($this->rel)) ? $this->rel : null; }
	public function setRel(string|null $rel): void { $this->rel = $rel; }
	public function getTarget(): string|null { return (isset($this->target)) ? $this->target : null; }
	public function setTarget(string|null $target): void { $this->target = $target; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->href)) { $result .= ' href="'.$this->href.'"'; }
		if (isset($this->hreflang)) { $result .= ' hreflang="'.$this->hreflang.'"'; }
		if (isset($this->media)) { $result .= ' media="'.$this->media.'"'; }
		if (isset($this->rel)) { $result .= ' rel="'.$this->rel.'"'; }
		if (isset($this->target)) { $result .= ' target="'.$this->target.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractLink(): void
	{
		if (isset($this->attributes['href'])) { $this->href = $this->attributes['href']; }
		if (isset($this->attributes['hreflang'])) { $this->hreflang = $this->attributes['hreflang']; }
		if (isset($this->attributes['media'])) { $this->media = $this->attributes['media']; }
		if (isset($this->attributes['rel'])) { $this->rel = $this->attributes['rel']; }
		if (isset($this->attributes['target'])) { $this->target = $this->attributes['target']; }
		if (isset($this->attributes['type'])) { $this->type = $this->attributes['type']; }
	}
	#endregion
}
?>