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
final class Script extends Body
{
	#region properties
	protected string|null $src				/** @property URI-or-file-path-of-the-script-resource */;
	protected string|null $type				/** @property MIME-Typ-of-the-script-resource */;
	protected string|null $charset			/** @property Character-set-of-the-script-resource */;
	protected string|null $crossorigin		/** @property Sets-the-mode-of-the-request-to-an-HTTP-CORS-Request */;
	protected string|null $integrity		/** @property Allows-a-browser-to-check-the-fetched-script-to-ensure-that-the-code-is-never-loaded-if-the-source-has-been-manipulated */;
	protected string|null $referrerpolicy	/** @property Specifies-which-referrer-information-to-send-when-fetching-a-script */;
	protected bool $async = false			/** @property Script-could-be-loaded-asynchronously-when-value-is-(true) */;
	protected bool $defer = false			/** @property Deklare-that-script-does-not-change-content-while-page-is-loading-when-value-is-(true) */;
	protected bool $nomodule = false		/** @property Specifies-that-the-script-should-not-be-executed-in-browsers-supporting-ES2015-modules */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Script; }
		parent::__construct($attributes);
		$this->mapScript();
	}
	#endregion

	#region getter / setter
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getCrossorigin(): string|null { return (isset($this->crossorigin)) ? $this->crossorigin : null; }
	public function setCrossorigin(string|null $crossorigin): void { $this->crossorigin = $crossorigin; }
	public function getIntegrity(): string|null { return (isset($this->integrity)) ? $this->integrity : null; }
	public function setIntegrity(string|null $integrity): void { $this->integrity = $integrity; }
	public function getReferrerpolicy(): string|null { return (isset($this->referrerpolicy)) ? $this->referrerpolicy : null; }
	public function setReferrerpolicy(string|null $referrerpolicy): void { $this->referrerpolicy = $referrerpolicy; }
	public function getCharset(): string|null { return (isset($this->charset)) ? $this->charset : null; }
	public function setCharset(string|null $charset): void { $this->charset = $charset; }
	public function getAsync(): bool { return $this->async; }
	public function setAsync(bool $async): void { $this->async = $async; }
	public function getDefer(): bool { return $this->defer; }
	public function setDefer(bool $defer): void { $this->defer = $defer; }
	public function getNomodule(): bool { return $this->nomodule; }
	public function setNomodule(bool $nomodule): void { $this->nomodule = $nomodule; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if (isset($this->charset)) { $result .= ' charset="'.$this->charset.'"'; }
		if (isset($this->crossorigin)) { $result .= ' crossorigin="'.$this->crossorigin.'"'; }
		if (isset($this->integrity)) { $result .= ' integrity="'.$this->integrity.'"'; }
		if (isset($this->referrerpolicy)) { $result .= ' referrerpolicy="'.$this->referrerpolicy.'"'; }
		if ($this->async === true) { $result .= ' async'; }
		if ($this->defer === true) { $result .= ' defer'; }
		if ($this->nomodule === true) { $result .= ' nomodule'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapScript(): void
	{
		if (isset($this->attributes['src'])) { $this->src = $this->attributes['src']; }
		if (isset($this->attributes['type'])) { $this->type = $this->attributes['type']; }
		if (isset($this->attributes['charset'])) { $this->charset = $this->attributes['charset']; }
		if (isset($this->attributes['crossorigin'])) { $this->crossorigin = $this->attributes['crossorigin']; }
		if (isset($this->attributes['integrity'])) { $this->integrity = $this->attributes['integrity']; }
		if (isset($this->attributes['referrerpolicy'])) { $this->referrerpolicy = $this->attributes['referrerpolicy']; }
		if (isset($this->attributes['async'])) { $this->async = (bool)$this->attributes['async']; }
		if (isset($this->attributes['defer'])) { $this->defer = (bool)$this->attributes['defer']; }
		if (isset($this->attributes['nomodule'])) { $this->nomodule = (bool)$this->attributes['nomodule']; }
	}
	#endregion
}
?>