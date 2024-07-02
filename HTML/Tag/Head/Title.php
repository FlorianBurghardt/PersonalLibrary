<?php
#region usings
namespace de\PersonalLibrary\HTML\Tag\Head;

use de\PersonalLibrary\HTML\Enum\TagList;
use de\PersonalLibrary\HTML\Tag\Head;
#endregion

final class Title extends Head
{
	#region properties
	protected string|null $title	/** @property Title-of-the-document-shown-in-headline-of-the-browser */;
	#endregion

	#region constructor
    public function __construct(array|null $attributes = null)
	{
		if (!isset($this->tagType)) { $this->tagType = TagList::Title; }
		parent::__construct($attributes);
		$this->mapTitle();
	}
	#endregion

	#region getter / setter
	public function getTitle(): string|null { return (isset($this->title)) ? $this->title : null; }
	public function setTitle(string|null $title): void { $this->title = $title; }
	#endregion

	#region methods
	protected function formatAttributes(string $result = ''): string
	{
		if (isset($this->title)) { $this->add($this->title); }
		$result = parent::formatAttributes($result);
		return $result;
	}
	protected function mapTitle(): void
	{
		if (isset($this->attributes['title'])) { $this->title = $this->attributes['title']; }
	}
	#endregion
}
?>