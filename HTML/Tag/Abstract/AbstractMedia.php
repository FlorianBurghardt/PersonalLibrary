<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;

use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * Abstract base class for all attributes of media HTML-Tags
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
abstract class AbstractMedia extends Body
{
	#region properties
	protected string|null $src				/** @property Base-URI-or-directory-for-image-files */;
	protected string|null $referrerpolicy	/** @property Specifies-which-referrer-policy-is-used.-Example:(no-referrer). */;
	protected string|null $xmlns			/** @property XML-namespace-or-URL */;
	protected string|null $viewBox			/** @property Viewbox-matrix */;
	protected int|null $width				/** @property Width-of-the-image */;
	protected int|null $height				/** @property Height-of-the-image */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractMedia();
	}
	#endregion

	#region getter / setter
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getReferrerpolicy(): string|null { return (isset($this->referrerpolicy)) ? $this->referrerpolicy : null; }
	public function setReferrerpolicy(string|null $referrerpolicy): void { $this->referrerpolicy = $referrerpolicy; }
	public function getXhtmlns(): string|null { return (isset($this->xmlns)) ? $this->xmlns : null; }
	public function setXhtmlns(string|null $xmlns): void { $this->xmlns = $xmlns; }
	public function getViewBox(): string|null { return (isset($this->viewBox)) ? $this->viewBox : null; }
	public function setViewBox(string|null $viewBox): void { $this->viewBox = $viewBox; }
	public function getWidth(): int|null { return (isset($this->width)) ? $this->width : null; }
	public function setWidth(int|null $width): void { $this->width = $width; }
	public function getHeight(): int|null { return (isset($this->height)) ? $this->height : null; }
	public function setHeight(int|null $height): void { $this->height = $height; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->referrerpolicy)) { $result .= ' referrerpolicy="'.$this->referrerpolicy.'"'; }
		if (isset($this->xmlns)) { $result .= ' xmlns="'.$this->xmlns.'"'; }
		if (isset($this->viewBox)) { $result .= ' viewBox="'.$this->viewBox.'"'; }
		if (isset($this->width)) { $result .= ' width="'.$this->width.'"'; }
		if (isset($this->height)) { $result .= ' height="'.$this->height.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractMedia(): void
	{
		if (isset($this->attributes['src'])) { $this->src = (string)$this->attributes['src']; }
		if (isset($this->attributes['referrerpolicy'])) { $this->referrerpolicy = (string)$this->attributes['referrerpolicy']; }
		if (isset($this->attributes['xmlns'])) { $this->xmlns = (string)$this->attributes['xmlns']; }
		if (isset($this->attributes['viewBox'])) { $this->viewBox = (string)$this->attributes['viewBox']; }
		if (isset($this->attributes['width'])) { $this->width = (int)$this->attributes['width']; }
		if (isset($this->attributes['height'])) { $this->height = (int)$this->attributes['height']; }
	}
	#endregion
}
?>