<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Form;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

class Output extends Body
{
	#region properties
	protected string|null $for	/** @property Specifies-the-relationship-between-the-result-of-the-calculation,-and-the-elements-used-in-the-calculation */;
	protected string|null $form	/** @property Specifies-which-form-the-output-element-belongs-to */;
	protected string|null $name	/** @property Specifies-a-name-for-the-output-element */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Output; }
		parent::__construct($attributes);
		$this->mapOutput();
	}
	#endregion

	#region getter / setter
	public function getFor(): string|null { return (isset($this->for)) ? $this->for : null; }
	public function setFor(string|null $for): void { $this->for = $for; }
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getName(): string|null { return (isset($this->name)) ? $this->name : null; }
	public function setName(string|null $name): void { $this->name = $name; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->for)) { $result .= ' for="'.$this->for.'"'; }
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->name)) { $result .= ' name="'.$this->name.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOutput(): void
	{
		if (isset($this->attributes['for'])) { $this->for = $this->attributes['for']; }
		if (isset($this->attributes['form'])) { $this->form = $this->attributes['form']; }
		if (isset($this->attributes['name'])) { $this->name = $this->attributes['name']; }
	}
	#endregion
}
?>