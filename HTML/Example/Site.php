<?php
#region usings
namespace de\PersonalLibrary\HTML\Example;

use de\PersonalLibrary\HTML\Tag\Body;
use de\PersonalLibrary\HTML\Tag\Head;
use de\PersonalLibrary\HTML\Tag\HTML;
#endregion

/**
 * Example class to show how to use de\PersonalLibrary\HTML framework
 * @version 1.0.0
 * @version lastUpdate 2024/07/07
 * @author Florian Burghardt
 * @copyright Copyright (c) 2024, Florian Burghardt
 */
class Site
{
	#region properties
	protected HTML $html;
    protected Head $head;
	protected Body $body;
	#endregion
	
	#region constructor
	/**
	 * Constructor for example site
	 * @param string $headTagID
	 * @param string $bodyTagID
	 */
	public function __construct($headTagID = 'head', $bodyTagID = 'body')
	{
        $this->html = new HTML(['tagID' => 'html']);
        $this->head = new Head(['tagID' => $headTagID]);
        $this->body = new Body(['tagID' => $bodyTagID]);
        $this->html->add($this->head);
        $this->html->add($this->body);
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