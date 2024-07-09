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
class Button extends Body
{
	#region properties
	protected string|null $form				/** @property Specifies-which-form-the-button-belongs-to */;
	protected string|null $formaction		/** @property Specifies-where-to-send-the-form-data-when-a-form-is-submitted.-Only-for-type="submit" */;
	protected string|null $formenctype		/** @property Specifies-how-form-data-should-be-encoded-before-sending-it-to-a-server.-Only-for-type="submit" */;
	protected string|null $formmethod		/** @property Specifies-how-to-send-the-form-data-(which-HTTP-method-to-use).-Only-for-type="submit" */;
	protected string|null $formtarget		/** @property Specifies-where-to-display-the-response-after-submitting-the-form.-Only-for-type="submit" */;
	protected string|null $name				/** @property Specifies-a-name-for-the-button */;
	protected string|null $type				/** @property Specifies-the-type-of-button */;
	protected string|null $value			/** @property Specifies-an-initial-value-for-the-button */;
	protected bool $autofocus = false		/** @property Specifies-that-a-button-should-automatically-get-focus-when-the-page-loads */;
	protected bool $disabled = false		/** @property Specifies-that-a-button-should-be-disabled */;
	protected bool $formnovalidate = false	/** @property Specifies-that-the-form-data-should-not-be-validated-on-submission.-Only-for-type="submit" */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Button; }
		parent::__construct($attributes);
		$this->mapButton();
	}
	#endregion

	#region getter / setter
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getFormaction(): string|null { return (isset($this->formaction)) ? $this->formaction : null; }
	public function setFormaction(string|null $formaction): void { $this->formaction = $formaction; }
	public function getFormenctype(): string|null { return (isset($this->formenctype)) ? $this->formenctype : null; }
	public function setFormenctype(string|null $formenctype): void { $this->formenctype = $formenctype; }
	public function getFormmethod(): string|null { return (isset($this->formmethod)) ? $this->formmethod : null; }
	public function setFormmethod(string|null $formmethod): void { $this->formmethod = $formmethod; }
	public function getFormtarget(): string|null { return (isset($this->formtarget)) ? $this->formtarget : null; }
	public function setFormtarget(string|null $formtarget): void { $this->formtarget = $formtarget; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getType(): string|null { return (isset($this->type)) ? $this->type : null; }
	public function setType(string|null $type): void { $this->type = $type; }
	public function getValue(): string|null { return (isset($this->value)) ? $this->value : null; }
	public function setValue(string|null $value): void { $this->value = $value; }
	public function getAutofocus(): bool { return $this->autofocus; }
	public function setAutofocus(bool $autofocus): void { $this->autofocus = $autofocus; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	public function getFormnovalidate(): bool { return $this->formnovalidate; }
	public function setFormnovalidate(bool $formnovalidate): void { $this->formnovalidate = $formnovalidate; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->formaction)) { $result .= ' formaction="'.$this->formaction.'"'; }
		if (isset($this->formenctype)) { $result .= ' formenctype="'.$this->formenctype.'"'; }
		if (isset($this->formmethod)) { $result .= ' formmethod="'.$this->formmethod.'"'; }
		if (isset($this->formtarget)) { $result .= ' formtarget="'.$this->formtarget.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->type)) { $result .= ' type="'.$this->type.'"'; }
		if (isset($this->value)) { $result .= ' value="'.$this->value.'"'; }
		if ($this->autofocus === true) { $result .= ' autofocus'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		if ($this->formnovalidate === true) { $result .= ' formnovalidate'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapButton(): void
	{
		if (isset($this->attributes['form'])) { $this->form = (string)$this->attributes['form']; }
		if (isset($this->attributes['formaction'])) { $this->formaction = (string)$this->attributes['formaction']; }
		if (isset($this->attributes['formenctype'])) { $this->formenctype = (string)$this->attributes['formenctype']; }
		if (isset($this->attributes['formmethod'])) { $this->formmethod = (string)$this->attributes['formmethod']; }
		if (isset($this->attributes['formtarget'])) { $this->formtarget = (string)$this->attributes['formtarget']; }
		if (isset($this->attributes['name'])) { $this->name = (string)$this->attributes['name']; }
		if (isset($this->attributes['type'])) { $this->type = (string)$this->attributes['type']; }
		if (isset($this->attributes['value'])) { $this->value = (string)$this->attributes['value']; }
		if (isset($this->attributes['autofocus'])) { $this->autofocus = (bool)$this->attributes['autofocus']; }
		if (isset($this->attributes['disabled'])) { $this->disabled = (bool)$this->attributes['disabled']; }
		if (isset($this->attributes['formnovalidate'])) { $this->formnovalidate = (bool)$this->attributes['formnovalidate']; }
	}
	#endregion
}
?>