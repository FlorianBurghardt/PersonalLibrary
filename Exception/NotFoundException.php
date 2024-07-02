<?php
#region usings
namespace de\PersonalLibrary\Exception;

use de\PersonalLibrary\Enum\StatusCode;
#endregion

/**
 * HTTP StatusCode 404 Not Found Exception
 * @version 1.0 
 * @version lastUpdate 2023/06/18
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
class NotFoundException extends MyException
{
	private StatusCode $statusCode = StatusCode::NOT_FOUND;

	public function __construct( string|null $message = null, int $innerCode = 0, int|null $code = null, \Throwable|null $previous = null)
	{
		if (is_null($message)) { $message = "Not Found"; }
		if (!is_null($code)) { $code = StatusCode::tryfrom($code); }
		if (!is_null($code)) { $this->statusCode = $code; }

		parent::__construct($message, $innerCode, $this->statusCode->value, $previous);
	}
}
?>