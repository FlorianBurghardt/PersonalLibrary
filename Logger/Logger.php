<?php
#region usings
namespace de\PersonalLibrary\Logger;

use de\PersonalLibrary\Response\ForbiddenMethods;
use de\PersonalLibrary\Response\Response;
#endregion

/**
 * Abstract logger [Singelton]
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
abstract class Logger extends ForbiddenMethods implements ILogger
{
	#region properties
	private Response $response;
	#endregion

	#region constructor
	public function __construct() { $this->response = Response::getInstance(); }
	#endregion

	#region methods
	final public function error_mail(): bool
	{
		$result = mail(
			$_SERVER['config']['namespace']['email'],							/*Mail to*/
			'['.$this->response->getStatusCode().'] '.
			$this->response->getStatusTitle().' '.
			$this->response->getMessage(),										/*Mail subject*/
			$this->response->getEmailResponse($this->response->getResult()),	/*Message*/
			'From: '.$_SERVER['config']['namespace']['from_email']);			/*Additional headers*/

		// Hide result content in response
		$this->response->setResult(null);
		
		return $result;
	}
	#endregion
}
?>