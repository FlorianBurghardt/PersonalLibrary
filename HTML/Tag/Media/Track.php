<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Media;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Body;
#endregion

/**
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Track extends Body
{
	#region properties
	protected string|null $default	/** @property Specifies-that-the-track-is-to-be-enabled-if-the-user's-preferences-do-not-indicate-that-another-track-would-be-more-appropriate */;
	protected string|null $kind		/** @property Specifies-the-kind-of-text-track */;
	protected string|null $label	/** @property Specifies-the-title-of-the-text-track */;
	protected string|null $src		/** @property Specifies-the-URL-of-the-track-file */;
	protected string|null $srclang	/** @property Specifies-the-language-of-the-track-text-data-(required-if-kind="subtitles") */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Track; }
		parent::__construct($attributes);
		$this->mapTrack();
	}
	#endregion

	#region getter / setter
	public function getDefault(): string|null { return (isset($this->default)) ? $this->default : null; }
	public function setDefault(string|null $default): void { $this->default = $default; }
	public function getKind(): string|null { return (isset($this->kind)) ? $this->kind : null; }
	public function setKind(string|null $kind): void { $this->kind = $kind; }
	public function getLabel(): string|null { return (isset($this->label)) ? $this->label : null; }
	public function setLabel(string|null $label): void { $this->label = $label; }
	public function getSrc(): string|null { return (isset($this->src)) ? $this->src : null; }
	public function setSrc(string|null $src): void { $this->src = $src; }
	public function getSrclang(): string|null { return (isset($this->srclang)) ? $this->srclang : null; }
	public function setSrclang(string|null $srclang): void { $this->srclang = $srclang; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->default)) { $result .= ' default="'.$this->default.'"'; }
		if (isset($this->kind)) { $result .= ' kind="'.$this->kind.'"'; }
		if (isset($this->label)) { $result .= ' label="'.$this->label.'"'; }
		if (isset($this->src)) { $result .= ' src="'.$this->src.'"'; }
		if (isset($this->srclang)) { $result .= ' srclang="'.$this->srclang.'"'; }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTrack(): void
	{
		if (isset($this->attributes['default'])) { $this->default = (string)$this->attributes['default']; }
		if (isset($this->attributes['kind'])) { $this->kind = (string)$this->attributes['kind']; }
		if (isset($this->attributes['label'])) { $this->label = (string)$this->attributes['label']; }
		if (isset($this->attributes['src'])) { $this->src = (string)$this->attributes['src']; }
		if (isset($this->attributes['srclang'])) { $this->srclang = (string)$this->attributes['srclang']; }
	}
	#endregion
}
?>