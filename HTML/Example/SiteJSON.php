<?php
#region usings
namespace de\PersonalLibrary\HTML\Example;

use de\PersonalLibrary\HTML\Tag\Body;
use de\PersonalLibrary\HTML\Tag\Head;
use de\PersonalLibrary\HTML\Tag\HTML;
#endregion

/**
 * Example class to show how to use de\PersonalLibrary\HTML framework in combination with JSON content files
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class SiteJSON
{
	#region properties
	protected HTML $html;
    protected Head $head;
	protected Body $body;
	#endregion
	
	#region constructor
	/**
	 * Constructor for example site with JSON content files
	 */
	public function __construct()
	{
        $this->html = new HTML(['tagID' => 'html']);
		$this->html->add('main.json', 'JSON_FILE');
		$this->head = $this->html->getTagById('Head');
		$this->body = $this->html->getTagById('body');
	}

	/**
	 * Destructor calls html->display() to show the site, this method should be called only once per site
	 */
	public function __destruct() { $this->html->display(); }
	#endregion

	#region getters
	public function getHtml(): HTML { return $this->html; }
	public function getHead(): Head { return $this->head; }
	public function getBody(): Body { return $this->body; }
	#endregion
}
?>