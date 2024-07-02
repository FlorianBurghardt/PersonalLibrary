<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Abstract;

use de\PersonalLibrary\HTML\Tag\Body;
#endregion

abstract class AbstractPlayable extends Body
{
	#region properties
	protected string|null $preload		/** @property Specifies-if-and-how-the-author-thinks-the-audio-should-be-loaded-when-the-page-loads */;
	protected string|null $src			/** @property Specifies-the-URL-of-the-audio-file */;
	protected bool $autoplay = false	/** @property Specifies-that-the-audio-will-start-playing-as-soon-as-it-is-ready */;
	protected bool $controls = true		/** @property Specifies-that-audio-controls-should-be-displayed-(such-as-a-play/pause-button-etc) */;
	protected bool $loop = false		/** @property Specifies-that-the-audio-will-start-over-again,-every-time-it-is-finished */;
	protected bool $muted = false		/** @property Specifies-that-the-audio-output-should-be-muted */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		parent::__construct($attributes);
		$this->mapAbstractPlayable();
	}
	#endregion

	#region getter / setter
	public function getPreload(): string|null { return (isset($this->preload)) ? $this->preload : null; }
	public function setPreload(string|null $preload): void { $this->preload = $preload; }
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getAutoplay(): bool { return $this->autoplay; }
	public function setAutoplay(bool $autoplay): void { $this->autoplay = $autoplay; }
	public function getControls(): bool { return $this->controls; }
	public function setControls(bool $controls): void { $this->controls = $controls; }
	public function getLoop(): bool { return $this->loop; }
	public function setLoop(bool $loop): void { $this->loop = $loop; }
	public function getMuted(): bool { return $this->muted; }
	public function setMuted(bool $muted): void { $this->muted = $muted; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->preload)) { $result .= ' preload="'.$this->preload.'"'; }
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if ($this->autoplay === true) { $result .= ' autoplay'; }
		if ($this->controls === true) { $result .= ' controls'; }
		if ($this->loop === true) { $result .= ' loop'; }
		if ($this->muted === true) { $result .= ' muted'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapAbstractPlayable(): void
	{
		if (isset($this->attributes['preload'])) { $this->preload = $this->attributes['preload']; }
		if (isset($this->attributes['src'])) { $this->src = $this->attributes['src']; }
		if (isset($this->attributes['autoplay'])) { $this->autoplay = (bool)$this->attributes['autoplay']; }
		if (isset($this->attributes['controls'])) { $this->controls = (bool)$this->attributes['controls']; }
		if (isset($this->attributes['loop'])) { $this->loop = (bool)$this->attributes['loop']; }
		if (isset($this->attributes['muted'])) { $this->muted = (bool)$this->attributes['muted']; }
	}
	#endregion
}
?>