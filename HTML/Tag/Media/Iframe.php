<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Abstract\AbstractMedia;
#endregion

class Iframe extends AbstractMedia
{
	#region properties
	protected string|null $name					/** @property The-name-of-the-iframe. */;
	protected string|null $srcdoc				/** @property HTML-code-directly-in-the-attribute. */;
	protected string|null $allow				/** @property Specifies-a-feature-policy-for-the-iframe. */;
	protected string|null $loading				/** @property Specifies-when-a-browser-should-load-an-iframe. */;
	protected bool $sandbox = true				/** @property Prevents-script-access-from-in-the-iframe-to-the-entire-document.-Default:(true) */;
	protected bool $allowfullscreen = false		/** @property Allow-fullscreen-mode.-Default:(false) */;
	protected bool $allowpaymentrequest	= false	/** @property Allow-payment-request.-Default:(false) */;
	protected bool $seamless = false			/** @property Seamless-mode.Iframe-should-look-like-a-part-of-the-document.containing.-Default:(false) */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Iframe; }
		parent::__construct($attributes);
		$this->mapIframe();
	}
	#endregion

	#region getter / setter
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }	
	public function getSrcdoc(): string|null { return (isset($this->srcdoc)) ? $this->srcdoc : null; }
	public function setSrcdoc(string|null $srcdoc): void { $this->srcdoc = $srcdoc; }
	public function getAllow(): string|null { return (isset($this->allow)) ? $this->allow : null; }
	public function setAllow(string|null $allow): void { $this->allow = $allow; }
	public function getLoading(): string|null { return (isset($this->loading)) ? $this->loading : null; }
	public function setLoading(string|null $loading): void { $this->loading = $loading; }
	public function getSandbox(): bool { return $this->sandbox; }
	public function setSandbox(bool $sandbox): void { $this->sandbox = $sandbox; }
	public function getAllowfullscreen(): bool { return $this->allowfullscreen; }
	public function setAllowfullscreen(bool $allowfullscreen): void { $this->allowfullscreen = $allowfullscreen; }
	public function getAllowpaymentrequest(): bool { return $this->allowpaymentrequest; }
	public function setAllowpaymentrequest(bool $allowpaymentrequest): void { $this->allowpaymentrequest = $allowpaymentrequest; }
	public function getSeamless(): bool { return $this->seamless; }
	public function setSeamless(bool $seamless): void { $this->seamless = $seamless; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->srcdoc)) { $result .= ' srcdoc="'.$this->srcdoc.'"'; }
		if (isset($this->allow)) { $result .= ' allow="'.$this->allow.'"'; }
		if (isset($this->loading)) { $result .= ' loading="'.$this->loading.'"'; }
		if ($this->sandbox === true) { $result .= ' sandbox'; }
		if ($this->allowfullscreen === true) { $result .= ' allowfullscreen'; }
		if ($this->allowpaymentrequest === true) { $result .= ' allowpaymentrequest'; }
		if ($this->seamless === true) { $result .= ' seamless'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapIframe(): void
	{
		if (isset($this->attributes['name'])) { $this->name = $this->attributes['name']; }
		if (isset($this->attributes['srcdoc'])) { $this->srcdoc = $this->attributes['srcdoc']; }
		if (isset($this->attributes['allow'])) { $this->allow = $this->attributes['allow']; }
		if (isset($this->attributes['loading'])) { $this->loading = $this->attributes['loading']; }
		if (isset($this->attributes['sandbox'])) { $this->sandbox = (bool)$this->attributes['sandbox']; }
		if (isset($this->attributes['allowfullscreen'])) { $this->allowfullscreen = (bool)$this->attributes['allowfullscreen']; }
		if (isset($this->attributes['allowpaymentrequest'])) { $this->allowpaymentrequest = (bool)$this->attributes['allowpaymentrequest']; }
		if (isset($this->attributes['seamless'])) { $this->seamless = (bool)$this->attributes['seamless']; }
	}
	#endregion
}
?>