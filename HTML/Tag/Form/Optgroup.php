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
class Optgroup extends Body
{
	#region properties
	protected string|null $label		/** @property Specifies-a-label-for-an-option-group */;
	protected bool $disabled = false	/** @property Specifies-that-an-option-group-should-be-disabled */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Optgroup; }
		parent::__construct($attributes);
		$this->mapOptgroup();
	}
	#endregion

	#region getter / setter
	public function getLabel(): string|null { return (isset($this->label)) ? $this->label : null; }
	public function setLabel(string|null $label): void { $this->label = $label; }
	public function getDisabled(): bool { return $this->disabled; }
	public function setDisabled(bool $disabled): void { $this->disabled = $disabled; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->label)) { $result .= ' label="'.$this->label.'"'; }
		if ($this->disabled === true) { $result .= ' disabled'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapOptgroup(): void
	{
		if (isset($this->attributes['label'])) { $this->label = $this->attributes['label']; }
		if (isset($this->attributes['disabled'])) { $this->disabled = (bool)$this->attributes['disabled']; }
	}
	#endregion
}
?>