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
final class Link extends Body
{
	#region properties
	protected string|null $rel				/** @property A-space-separated-list-of-relationship-types */;
	protected string|null $type				/** @property MIME-Typ-of-the-linked-resource */;
	protected string|null $href				/** @property URI-or-file-path-of-the-linked-resource */;
	protected string|null $sizes			/** @property A-space-separated-list-of-sizes-(only-for-rel="icon") */;
	protected string|null $hreflang			/** @property Language-code-of-the-linked-resource */;
	protected string|null $referrerpolicy	/** @property Specifies-which-referrer-policy-is-used.-Example:(no-referrer). */;
	protected string|null $integrity		/** @property Integrity-of-the-linked-resource */;
	protected string|null $crossorigin		/** @property Cross-origin-of-the-linked-resource */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Link; }
		$this->onlyOpenTag = true;
		parent::__construct($attributes);
		$this->mapLink();
	}
	#endregion

	#region getter / setter
	public function getRel(): string|null { return (isset($this->rel)) ? $this->rel : null; }
	public function setRel(string|null $rel): void { $this->rel = $rel; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getHref(): string|null { return (isset($this->href)) ? $this->href : null; }
	public function setHref(string|null $href): void { $this->href = $href; }
	public function getSizes(): string|null { return (isset($this->sizes)) ? $this->sizes : null; }
	public function setSizes(string|null $sizes): void { $this->sizes = $sizes; }
	public function getHreflang(): string|null { return (isset($this->hreflang)) ? $this->hreflang : null; }
	public function setHreflang(string|null $hreflang): void { $this->hreflang = $hreflang; }
	public function getReferrerpolicy(): string|null { return (isset($this->referrerpolicy)) ? $this->referrerpolicy : null; }
	public function setReferrerpolicy(string|null $referrerpolicy): void { $this->referrerpolicy = $referrerpolicy; }
	public function getIntegrity(): string|null { return (isset($this->integrity)) ? $this->integrity : null; }
	public function setIntegrity(string|null $integrity): void { $this->integrity = $integrity; }
	public function getCrossorigin(): string|null { return (isset($this->crossorigin)) ? $this->crossorigin : null; }
	public function setCrossorigin(string|null $crossorigin): void { $this->crossorigin = $crossorigin; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->rel)) { $result .= ' rel="'.$this->rel.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if (isset($this->href)) { $result .= ' href="'.$this->href.'"'; }
		if (isset($this->sizes)) { $result .= ' sizes="'.$this->sizes.'"'; }
		if (isset($this->hreflang)) { $result .= ' hreflang="'.$this->hreflang.'"'; }
		if (isset($this->referrerpolicy)) { $result .= ' referrerpolicy="'.$this->referrerpolicy.'"'; }
		if (isset($this->integrity)) { $result .= ' integrity="'.$this->integrity.'"'; }
		if (isset($this->crossorigin)) { $result .= ' crossorigin="'.$this->crossorigin.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapLink(): void
	{
		if (isset($this->attributes['rel'])) { $this->rel = (string)$this->attributes['rel']; }
		if (isset($this->attributes['type'])) { $this->type = (string)$this->attributes['type']; }
		if (isset($this->attributes['href'])) { $this->href = (string)$this->attributes['href']; }
		if (isset($this->attributes['sizes'])) { $this->sizes = (string)$this->attributes['sizes']; }
		if (isset($this->attributes['hreflang'])) { $this->hreflang = (string)$this->attributes['hreflang']; }
		if (isset($this->attributes['referrerpolicy'])) { $this->referrerpolicy = (string)$this->attributes['referrerpolicy']; }
		if (isset($this->attributes['integrity'])) { $this->integrity = (string)$this->attributes['integrity']; }
		if (isset($this->attributes['crossorigin'])) { $this->crossorigin = (string)$this->attributes['crossorigin']; }
	}
	#endregion
}
?>