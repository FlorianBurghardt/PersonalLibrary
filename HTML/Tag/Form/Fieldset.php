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
class Fieldset extends Body
{
	#region properties
	protected string|null $form			/** @property Specifies-which-form-the-fieldset-belongs-to */;
	protected string|null $name			/** @property Specifies-a-name-for-the-fieldset */;
	protected bool $disabled = false	/** @property Specifies-that-a-group-of-related-form-elements-should-be-disabled */;

	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Fieldset; }
		parent::__construct($attributes);
		$this->mapFieldset();
	}
	#endregion

	#region getter / setter
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapFieldset(): void
	{
		if (isset($this->attributes['form'])) { $this->form = $this->attributes['form']; }
		if (isset($this->attributes['name'])) { $this->name = $this->attributes['name']; }
		if (isset($this->attributes['disabled'])) { $this->disabled = (bool)$this->attributes['disabled']; }
	}
	#endregion
}
?>