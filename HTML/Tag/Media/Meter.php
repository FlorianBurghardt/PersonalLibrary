<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Meter extends Progress
{
	#region properties
	protected string|null $form		/** @property Defines-the-form */;
	protected float|null $min		/** @property Defines-the-minimum-value */;
	protected float|null $low		/** @property Defines-small-vlaues-but-not-the-minimum */;
	protected float|null $high		/** @property Defines-high-values-but-not-the-maximum-value */;
	protected float|null $optimum	/** @property Defines-the-optimum-value */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Meter; }
		$this->templateFile = 'double_after.html';
		parent::__construct($attributes);
		$this->mapMeter();
	}
	#endregion

	#region getter / setter
	public function getForm(): string|null { return (isset($this->form)) ? $this->form : null; }
	public function setForm(string|null $form): void { $this->form = $form; }
	public function getMin(): float|null { return (isset($this->min)) ? $this->min : null; }
	public function setMin(float|null $min): void { $this->min = $min; }
	public function getLow(): float|null { return (isset($this->low)) ? $this->low : null; }
	public function setLow(float|null $low): void { $this->low = $low; }
	public function getHigh(): float|null { return (isset($this->high)) ? $this->high : null; }
	public function setHigh(float|null $high): void { $this->high = $high; }
	public function getOptimum(): float|null { return (isset($this->optimum)) ? $this->optimum : null; }
	public function setOptimum(float|null $optimum): void { $this->optimum = $optimum; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->form)) { $result .= ' form="'.$this->form.'"'; }
		if (isset($this->min)) { $result .= ' min="'.$this->min.'"'; }
		if (isset($this->low)) { $result .= ' low="'.$this->low.'"'; }
		if (isset($this->high)) { $result .= ' high="'.$this->high.'"'; }
		if (isset($this->optimum)) { $result .= ' optimum="'.$this->optimum.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapMeter(): void
	{
		if (isset($this->attributes['form'])) { $this->form = $this->attributes['form']; }
		if (isset($this->attributes['min'])) { $this->min = (float)$this->attributes['min']; }
		if (isset($this->attributes['low'])) { $this->low = (float)$this->attributes['low']; }
		if (isset($this->attributes['high'])) { $this->high = (float)$this->attributes['high']; }
		if (isset($this->attributes['optimum'])) { $this->optimum = (float)$this->attributes['optimum']; }
	}
	#endregion
}
?>