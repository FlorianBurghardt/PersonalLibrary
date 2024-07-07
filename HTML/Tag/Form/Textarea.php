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
class Textarea extends Body
{
	#region properties
	protected string|null $dirname		/** @property Specifies-that-the-text-direction-of-the-textarea-will-be-submitted */;
	protected string|null $form			/** @property Specifies-which-form-the-text-area-belongs-to */;
	protected string|null $name			/** @property Specifies-a-name-for-a-text-area */;
	protected string|null $placeholder	/** @property Specifies-a-short-hint-that-describes-the-expected-value-of-a-text-area */;
	protected string|null $wrap			/** @property Specifies-how-the-text-in-a-text-area-is-to-be-wrapped-when-submitted-in-a-form */;
	protected int|null $cols			/** @property Specifies-the-visible-width-of-a-text-area */;
	protected int|null $maxlength		/** @property Specifies-the-maximum-number-of-characters-allowed-in-the-text-area */;
	protected int|null $rows			/** @property Specifies-the-visible-number-of-lines-in-a-text-area */;
	protected bool $autofocus = false	/** @property Specifies-that-a-text-area-should-automatically-get-focus-when-the-page-loads */;
	protected bool $disabled = false	/** @property Specifies-that-a-text-area-should-be-disabled */;
	protected bool $readonly = false	/** @property Specifies-that-a-text-area-should-be-read-only */;
	protected bool $required = false	/** @property Specifies-that-a-text-area-is-required/must-be-filled-out */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Textarea; }
		parent::__construct($attributes);
		$this->mapTextarea();
	}
	#endregion

	#region getter / setter
	public function getDirname(): string|null { return (isset($this->dirname)) ? $this->dirname : null; }
	public function setDirname(string|null $dirname): void { $this->dirname = $dirname; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getPlaceholder(): string|null { return (isset($this->placeholder)) ? $this->placeholder : null; }
	public function setPlaceholder(string|null $placeholder): void { $this->placeholder = $placeholder; }
	public function getWrap(): string|null { return (isset($this->wrap)) ? $this->wrap : null; }
	public function setWrap(string|null $wrap): void { $this->wrap = $wrap; }
	public function getCols(): int|null { return (isset($this->cols)) ? $this->cols : null; }
	public function setCols(int|null $cols): void { $this->cols = $cols; }
	public function getMaxLength(): int|null { return (isset($this->maxlength)) ? $this->maxlength : null; }
	public function setMaxLength(int|null $maxlength): void { $this->maxlength = $maxlength; }
	public function getRows(): int|null { return (isset($this->rows)) ? $this->rows : null; }
	public function setRows(int|null $rows): void { $this->rows = $rows; }
	public function getAutofocus(): bool { return $this->autofocus; }
	public function setAutofocus(bool $autofocus): void { $this->autofocus = $autofocus; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	public function getReadonly(): bool { return $this->readonly; }
	public function setReadonly(bool $readonly): void { $this->readonly = $readonly; }
	public function getRequired(): bool { return $this->required; }
	public function setRequired(bool $required): void { $this->required = $required; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->dirname)) { $result .= ' dir="'.$this->dirname.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if (isset($this->placeholder)) { $result .= ' placeholder="'.$this->placeholder.'"'; }
		if (isset($this->wrap)) { $result .= ' wrap="'.$this->wrap.'"'; }
		if (isset($this->cols)) { $result .= ' cols="'.$this->cols.'"'; }
		if (isset($this->maxlength)) { $result .= ' maxlength="'.$this->maxlength.'"'; }
		if (isset($this->rows)) { $result .= ' rows="'.$this->rows.'"'; }
		if ($this->autofocus === true) { $result .= ' autofocus'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		if ($this->readonly === true) { $result .= ' readonly'; }
		if ($this->required === true) { $result .= ' required'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTextarea(): void
	{
		if (isset($this->attributes['dirname'])) { $this->dirname = $this->attributes['dirname']; }
		if (isset($this->attributes['form'])) { $this->form = $this->attributes['form']; }
		if (isset($this->attributes['name'])) { $this->name = $this->attributes['name']; }
		if (isset($this->attributes['placeholder'])) { $this->placeholder = $this->attributes['placeholder']; }
		if (isset($this->attributes['wrap'])) { $this->wrap = $this->attributes['wrap']; }
		if (isset($this->attributes['cols'])) { $this->cols = (int)$this->attributes['cols']; }
		if (isset($this->attributes['maxlength'])) { $this->maxlength = (int)$this->attributes['maxlength']; }
		if (isset($this->attributes['rows'])) { $this->rows = (int)$this->attributes['rows']; }
		if (isset($this->attributes['autofocus'])) { $this->autofocus = (bool)$this->attributes['autofocus']; }
		if (isset($this->attributes['disabled'])) { $this->disabled = (bool)$this->attributes['disabled']; }
		if (isset($this->attributes['readonly'])) { $this->readonly = (bool)$this->attributes['readonly']; }
		if (isset($this->attributes['required'])) { $this->required = (bool)$this->attributes['required']; }
	}
	#endregion
}
?>