<?php
#region usings
namespace de\PersonalLibrary\HTML\Example;

use de\PersonalLibrary\HTML\Tag\Body;
use de\PersonalLibrary\HTML\Tag\Head;
use de\PersonalLibrary\HTML\Tag\HTML;

#endregion

class SiteJSON
{
	#region properties
	protected HTML $html;
    protected Head $head;
	protected Body $body;
	#endregion
	
	#region constructor
	public function __construct()
	{
        $this->html = new HTML(['tagID' => 'html']);
		$this->html->add('main.json', 'JSON_FILE');
		$this->head = $this->html->getTagById('Head');
		$this->body = $this->html->getTagById('body');
	}
	public function __destruct() { $this->html->display(); }
	#endregion

	#region getters
	public function getHtml(): HTML { return $this->html; }
	public function getHead(): Head { return $this->head; }
	public function getBody(): Body { return $this->body; }
	#endregion
}
?>