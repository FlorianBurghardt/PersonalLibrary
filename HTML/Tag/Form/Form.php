<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Form;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Form extends Body
{
	#region properties
	protected string|null $acceptCharset	/** @property Specifies-the-character-encodings-that-are-to-be-used-for-the-form-submission */;
	protected string|null $action			/** @property Specifies-where-to-send-the-form-data-when-a-form-is-submitted */;
	protected string|null $autocomplete		/** @property Specifies-whether-a-form-should-have-autocomplete-on-or-off */;
	protected string|null $enctype			/** @property Specifies-how-the-form-data-should-be-encoded-when-submitting-it-to-the-server-(only-for-method="post") */;
	protected string|null $method			/** @property Specifies-the-HTTP-method-to-use-when-sending-form-data */;
	protected string|null $name				/** @property Specifies-the-name-of-a-form */;
	protected string|null $rel				/** @property Specifies-the-relationship-between-a-linked-resource-and-the-current-document */;
	protected string|null $target			/** @property Specifies-where-to-display-the-response-that-is-received-after-submitting-the-form */;
	protected bool $novalidate = false		/** @property Specifies-that-the-form-should-not-be-validated-when-submitted */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Form; }
		parent::__construct($attributes);
		$this->mapForm();
	}
	#endregion

	#region getter / setter
	public function getAcceptCharset(): string|null { return (isset($this->acceptCharset)) ? $this->acceptCharset : null; }
	public function setAcceptCharset(string|null $acceptCharset): void { $this->acceptCharset = $acceptCharset; }
	public function getAction(): string|null { return (isset($this->action)) ? $this->action : null; }
	public function setAction(string|null $action): void { $this->action = $action; }
	public function getAutocomplete(): string|null { return (isset($this->autocomplete)) ? $this->autocomplete : null; }
	public function setAutocomplete(string|null $autocomplete): void { $this->autocomplete = $autocomplete; }
	public function getEnctype(): string|null { return (isset($this->enctype)) ? $this->enctype : null; }
	public function setEnctype(string|null $enctype): void { $this->enctype = $enctype; }
	public function getMethod(): string|null { return (isset($this->method)) ? $this->method : null; }
	public function setMethod(string|null $method): void { $this->method = $method; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getRel(): string|null { return (isset($this->rel)) ? $this->rel : null; }
	public function setRel(string|null $rel): void { $this->rel = $rel; }
	public function getTarget(): string|null { return (isset($this->target)) ? $this->target : null; }
	public function setTarget(string|null $target): void { $this->target = $target; }
	public function getNovalidate(): bool { return $this->novalidate; }
	public function setNovalidate(bool $novalidate): void { $this->novalidate = $novalidate; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->acceptCharset)) { $result .= ' accept-charset="'.$this->acceptCharset.'"'; }
		if (isset($this->action)) { $result .= ' action="'.$this->action.'"'; }
		if (isset($this->autocomplete)) { $result .= ' autocomplete="'.$this->autocomplete.'"'; }
		if (isset($this->enctype)) { $result .= ' enctype="'.$this->enctype.'"'; }
		if (isset($this->method)) { $result .= ' method="'.$this->method.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->rel)) { $result .= ' rel="'.$this->rel.'"'; }
		if (isset($this->target)) { $result .= ' target="'.$this->target.'"'; }
		if ($this->novalidate === true) { $result .= ' novalidate'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapForm(): void
	{
		if (isset($this->attributes['acceptCharset'])) { $this->acceptCharset = $this->attributes['acceptCharset']; }
		if (isset($this->attributes['action'])) { $this->action = $this->attributes['action']; }
		if (isset($this->attributes['autocomplete'])) { $this->autocomplete = $this->attributes['autocomplete']; }
		if (isset($this->attributes['enctype'])) { $this->enctype = $this->attributes['enctype']; }
		if (isset($this->attributes['method'])) { $this->method = $this->attributes['method']; }
		if (isset($this->attributes['name'])) { $this->name = $this->attributes['name']; }
		if (isset($this->attributes['rel'])) { $this->rel = $this->attributes['rel']; }
		if (isset($this->attributes['target'])) { $this->target = $this->attributes['target']; }
		if (isset($this->attributes['novalidate'])) { $this->novalidate = (bool)$this->attributes['novalidate']; }
	}
	#endregion
}
?>