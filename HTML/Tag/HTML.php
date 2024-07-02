<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag;

use de\PersonalLibrary\HTML\Enum\TagList;
#endregion

final class HTML extends Body
{
	#region properties
	protected string|null $lang		/** @property Defines-the-language */;
	protected string|null $dir		/** @property Defines-the-reading-direction-(ltr-rtl)-for-whole-page */;
	protected string|null $manifest	/** @property Defines-the-path-of-the-cache-ressource-for-offline-access */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::HTML; }
		$this->templateFile = 'html.html';
		parent::__construct($attributes);
		$this->mapHTML();
	}
	#endregion

	#region getter / setter
	public function getLang(): string|null { return (isset($this->lang)) ? $this->lang : null; }
	public function setLang(string|null $lang): void { $this->lang = $lang; }
	public function getDir(): string|null { return (isset($this->dir)) ? $this->dir : null; }
	public function setDir(string|null $dir): void { $this->dir = $dir; }
	public function getManifest(): string|null { return (isset($this->manifest)) ? $this->manifest : null; }
	public function setManifest(string|null $manifest): void { $this->manifest = $manifest; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->lang)) { $result .= ' lang="'.$this->lang.'"'; }
		if (isset($this->dir)) { $result .= ' dir="'.$this->dir.'"'; }
		if (isset($this->manifest)) { $result .= ' manifest="'.$this->manifest.'"'; }
		return $result;
	}
	protected function mapHTML(): void
	{
		if (isset($this->attributes['lang'])) { $this->lang = $this->attributes['lang']; }
		if (isset($this->attributes['dir'])) { $this->dir = $this->attributes['dir']; }
		if (isset($this->attributes['manifest'])) { $this->manifest = $this->attributes['manifest']; }
	}
	#endregion
}
?>